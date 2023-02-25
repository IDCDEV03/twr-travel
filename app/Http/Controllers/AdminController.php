<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\user_car_rent;
use App\Models\package_img;
use App\Models\package_tour;
use App\Models\ListCar;
use App\Models\User;
use App\Models\member_booking_package;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmPayment_Pay1;
use App\Mail\ConfirmPayment_Pay2;
use App\Mail\ConfirmPayment_Package1;
use App\Mail\ConfirmPayment_Package2;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\QuotationSend;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

  public function home()
  {
    $role=Auth::user()->is_admin;
    if($role == '1')
      {
      $userbooking = DB::table('member_booking_packages')
        ->where('booking_status', '=', 0)
        ->get();

        $user_payment_tour = DB::table('member_booking_packages')
        ->where('booking_status', '=', '4')
        ->get();

        $user_car_rental = DB::table('user_car_rents')
        ->where('rent_status','=','0')
        ->get();

      return view('admin.index', compact('userbooking','user_payment_tour','user_car_rental'));
      }
    else
    {
      return redirect()->route('login.show')->with('error', 'เฉพาะผู้ดูแลระบบเท่านั้น');
    }
  }

  public function index()
  {
    $package_tour = package_tour::All();
    return view('admin.list_package', compact('package_tour'));
  }

  public function admin_setting()
  {
    return view('admin.admin_setting');
  }

  public function booking_chk()
  {
    $package_tour = DB::table('member_booking_packages')
      ->join('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->orderBy('member_booking_packages.created_at', 'desc')
      ->where('member_booking_packages.booking_status','!=', '5')
      ->get([
        'member_booking_packages.booking_id',
        'member_booking_packages.member_name',
        'member_booking_packages.number_of_travel',
        'member_booking_packages.created_at',
        'member_booking_packages.booking_status',
        'member_booking_packages.package_id',
        'package_tours.package_id',
        'package_tours.package_name',
        'package_tours.code_tour'
      ]);
    return view('admin.booking_chk', compact('package_tour'));
  }

  public function booking_cf($id)
  {
    $booking_user = DB::table('member_booking_packages')
      ->join('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();

    return view('admin.booking_cf', compact('booking_user'));
  }

  public function edit_pk($id)
  {
    $pk_tour = DB::table('package_tours')
      ->where('id', '=', $id)
      ->get();
    return view('admin.edit_package', compact('pk_tour'));
  }

  public function edit_pk_img($id)
  {
    $pk_tour_img = DB::table('package_imgs')
      ->where('package_id', '=', $id)
      ->get();
    $pk_img_count = DB::table('package_imgs')
      ->where('package_id', '=', $id)->count();
    return view('admin.edit_package_img', compact('pk_tour_img', 'pk_img_count'));
  }

  public function package_img_delete($id)
  {
    //ลบข้อมูลจากฐานข้อมูล
    $pk_img = package_img::find($id);
    $image_path = 'public/package_file/' . $pk_img->package_img;
    unlink($image_path);

    $delete = package_img::find($id)->delete();
    return redirect()->back()->with('delete', "ลบข้อมูลเรียบร้อย");
  }

  public function update_img(Request $request, $id)
  {
    $images = $request->package_img;
    $upload_location = 'public/package_file/';
    $imageName = time() . rand(1, 99) . '.' . $images->extension();
    $images->move($upload_location, $imageName);

    package_img::insert([
      'package_id' => $id,
      'package_img' => $imageName,
      'created_at' => Carbon::now()
    ]);
    return redirect()->back()->with('success', "เพิ่มข้อมูลเรียบร้อย");
  }


  public function package_detail($id)
  {
    $package_detail = DB::table('package_tours')
      ->where('package_id', '=', $id)
      ->get();
    return view('admin.package_detail', compact('package_detail'));
  }

  public function update_package(Request $request, $id)
  {
    //การเข้ารหัสรูปภาพ
    $package_file = $request->file('package_file');
    $package_cover = $request->file('package_cover');
    if ($package_cover) {
      $old_cover = $request->old_cover;
      $package_cover = $request->file('package_cover');
      //generate รูปภาพ
      $name_gen = hexdec(uniqid());
      //ดึงนามสกุลไฟล์ภาพ
      $pk_cover = strtolower($package_cover->getClientOriginalExtension());
      $pk_cover_name = $name_gen . '.' . $pk_cover;

      //อัพโหลดและบันทึกข้อมูล
      $upload_location = 'public/package_file/';
      $pk_cover_full_path = $upload_location . $pk_cover_name;
      unlink($old_cover);

      package_tour::find($id)->update([
        'package_cover' => $pk_cover_full_path,
      ]);
      $package_cover->move($upload_location, $pk_cover_name);
    } else {
      package_tour::find($id)->update([
        'package_cover' => $request->old_cover
      ]);
    }

    if ($package_file) {
      //การเข้ารหัสรูปภาพ
      $package_file = $request->file('package_file');
      //generate รูปภาพ
      $name_gen = hexdec(uniqid());
      //ดึงนามสกุลไฟล์ภาพ
      $pk_ext = strtolower($package_file->getClientOriginalExtension());
      $package_file_name = $name_gen . '.' . $pk_ext;

      //อัพโหลดและบันทึกข้อมูล
      $upload_location = 'public/package_file/';
      $full_path = $upload_location . $package_file_name;

      $package_veh = $request->package_veh;

      if ($package_veh) {
        $package_veh_list = implode(',', (array) $request['package_veh']);
      } else {
        $package_veh_list = $request->old_veh;
      }
      package_tour::find($id)->update([
        'package_name' => $request->package_name,
        'package_place' => $request->package_location,
        'package_type' => $request->package_type,
        'code_tour' => $request->code_tour,
        'package_veh' => $package_veh_list,
        'package_min_customer' => $request->package_min_cus,
        'package_total_day' => $request->package_total_day,
        'package_period_start' => $request->package_period_start,
        'package_period_end' => $request->package_period_end,
        'package_price' => $request->package_price,
        'package_file' => $full_path,
        'package_deposit' => $request->package_deposit,
        'highlight_tour' => $request->highlight_tour,
        'package_detail' => $request->package_detail,
        'package_status' => $request->package_status,
        'updated_at' => Carbon::now()
      ]);
      $package_file->move($upload_location, $package_file_name);
      return redirect()->route('list_package')->with('update', "แก้ไขข้อมูลเรียบร้อยแล้ว");
    } else {
      $package_veh = $request->package_veh;

      if ($package_veh) {
        $package_veh_list = implode(',', (array) $request['package_veh']);
      } else {
        $package_veh_list = $request->old_veh;
      }
      package_tour::find($id)->update([
        'package_name' => $request->package_name,
        'package_place' => $request->package_location,
        'package_type' => $request->package_type,
        'code_tour' => $request->code_tour,
        'package_veh' => $package_veh_list,
        'package_min_customer' => $request->package_min_cus,
        'package_total_day' => $request->package_total_day,
        'package_period_start' => $request->package_period_start,
        'package_period_end' => $request->package_period_end,
        'package_price' => $request->package_price,
        'package_deposit' => $request->package_deposit,
        'highlight_tour' => $request->highlight_tour,
        'package_detail' => $request->package_detail,
        'package_status' => $request->package_status,
        'updated_at' => Carbon::now()
      ]);
      return redirect()->route('list_package')->with('update', "แก้ไขข้อมูลเรียบร้อยแล้ว");
    }
  }


  public function save_package(Request $request)
  {
    //ตรวจสอบข้อมูล
    $request->validate(
      [
        'code_tour' => 'required|unique:package_tours|max:100',
        'package_status' => 'required',
        'image.*' => 'mimes:jpg,jpeg,png|max:2048',
        'image' =>  'max:5'

      ],
      [
        'code_tour.unique' => "มีรหัสทัวร์นี้แล้ว กรุณาใส่รหัสทัวร์ใหม่",
        'package_status.required' => "กรุณาเลือกสถานะแพ็คเกจ",
        'image.max' => "ไม่สามารถอัพโหลดได้เกิน 5 ภาพ"
      ]
    );
    //การเข้าไฟล์
    $package_file = $request->file('package_file');
    $package_cover = $request->package_cover;
    //generate รูปภาพ
    $name_gen = hexdec(uniqid());
    //ดึงนามสกุลไฟล์ภาพ
    $pk_ext = strtolower($package_file->getClientOriginalExtension());
    $pk_cover = strtolower($package_cover->getClientOriginalExtension());
    $package_file_name = $name_gen . '.' . $pk_ext;
    $pk_cover_name = $name_gen . '.' . $pk_cover;

    //อัพโหลดและบันทึกข้อมูล
    $upload_location = 'public/package_file/';
    $full_path = $upload_location . $package_file_name;
    $pk_cover_full_path = $upload_location . $pk_cover_name;
    $package_veh = implode(',', (array) $request['package_veh']);

    $pk_id = Str::random(12);
    if ($request->hasFile('image')) {
      foreach ($request->image as $key => $images) {
        $imageName = time() . rand(1, 99) . '.' . $images->extension();
        $images->move($upload_location, $imageName);

        package_img::insert([
          'package_id' => $pk_id,
          'package_img' => $imageName,
          'created_at' => Carbon::now()
        ]);
      }
    }

    package_tour::insert([
      'package_id' => $pk_id,
      'package_cover' => $pk_cover_full_path,
      'package_name' => $request->package_name,
      'package_place' => $request->package_location,
      'package_type' => $request->package_type,
      'code_tour' => $request->code_tour,
      'package_veh' => $package_veh,
      'package_min_customer' => $request->package_min_cus,
      'package_total_day' => $request->package_total_day,
      'package_period_start' => $request->package_period_start,
      'package_period_end' => $request->package_period_end,
      'package_price' => $request->package_price,
      'package_file' => $full_path,
      'package_deposit' => $request->package_deposit,
      'highlight_tour' => $request->highlight_tour,
      'package_detail' => $request->package_detail,
      'package_status' => $request->package_status,
      'created_at' => Carbon::now()
    ]);
    $package_file->move($upload_location, $package_file_name);
    $package_cover->move($upload_location, $pk_cover_name);
    return redirect()->route('list_package')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }


  public function add_package()
  {
    return view('admin.add_package');
  }

  public function add_quotation(Request $request, $id)
  {
    $quotation_id = date("ymd-hs");
    $package_file = $request->file('package_file');

    if ($package_file) {
      //generate รูปภาพ
      $name_gen = hexdec(uniqid());
      //ดึงนามสกุลไฟล์ภาพ
      $pk_ext = strtolower($package_file->getClientOriginalExtension());
      $package_file_name = $name_gen . '.' . $pk_ext;

      //อัพโหลดและบันทึกข้อมูล
      $upload_location = 'public/package_file/';
      $full_path = $upload_location . $package_file_name;

      DB::table('booking_quotations')->insert([
        'booking_id' => $request->booking_id,
        'quotation_id' => $quotation_id,
        'package_id' => $request->package_id,
        'total_price' => $request->total_price,
        'price_deposit' => $request->price_deposit,
        'package_file' => $full_path,
        'quotation_detail' => $request->quotation_detail, 
        'created_at' => Carbon::now()
      ]);
      $package_file->move($upload_location, $package_file_name);
      return redirect()->route('booking_chk')->with('success', "ส่งใบเสนอราคาเรียบร้อยแล้ว");
      $this->send_quotation($request->email);
    } else {

      DB::table('booking_quotations')->insert([
        'booking_id' => $request->booking_id,
        'quotation_id' => $quotation_id,
        'package_id' => $request->package_id,
        'total_price' => $request->total_price,
        'price_deposit' => $request->price_deposit,
        'package_file' => 'none',
        'quotation_detail' => $request->quotation_detail,
        'created_at' => Carbon::now()
      ]);

      DB::table('member_booking_packages')
        ->where('booking_id', '=', $request->booking_id)
        ->update([
          'booking_status' => '1',
          'updated_at' => Carbon::now()
        ]);
      $this->send_quotation($request->email);
      return redirect()->route('booking_chk')->with('success', "ส่งใบเสนอราคาเรียบร้อยแล้ว");      
    }
   }

  public function send_quotation($id)
  {
    $email = $id;
    Mail::to($email)->send(new QuotationSend($id));
  }

  public function list_car()
  {
    $list_car = ListCar::All();
    return view('admin.list_car', compact('list_car'));
  }

  public function add_car()
  {
    return view('admin.add_car');
  }

  public function add_listcar(Request $request)
  {
    $request->validate(
      [
        'car_name' => 'unique:list_cars|max:100',
        'car_number' => 'unique:list_cars|max:8'
      ],
      [
        'car_name.max' => "ห้ามระบุเกิน 100 ตัวอักษร",
        'car_number.max' => "สามารถระบุได้ไม่เกิน 8 ตัวอักษร",
        'car_name.unique' => "มีชื่อรถนี้แล้ว กรุณาระบุชื่อใหม่",
        'car_number.unique' => "มีทะเบียนรถนี้แล้ว กรุณาระบุทะเบียนใหม่",
      ]
    );
    ListCar::insert([
      'car_id' => Str::random(9),
      'car_name' => $request->car_name,
      'car_number' => $request->car_number,
      'car_book' => $request->car_book,
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('list_car')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

  public function edit_car($id)
  {
    $list_car = ListCar::find($id);
    return view('admin.edit_car', compact('list_car'));
  }

  public function update_car(Request $request, $id)
  {
    $request->validate(
      [
        'car_name' => 'max:100',
        'car_number' => 'unique:list_cars|max:8'
      ],
      [
        'car_name.max' => "ห้ามระบุเกิน 100 ตัวอักษร",
        'car_number.max' => "สามารถระบุได้ไม่เกิน 8 ตัวอักษร",
        'car_number.unique' => "มีทะเบียนรถนี้แล้ว กรุณาระบุทะเบียนใหม่",
      ]
    );
    //อัพเดทข้อมูลในฐานข้อมูล
    ListCar::find($id)->update([
      'car_name' => $request->car_name,
      'car_number' => $request->car_number,
      'car_book' => $request->car_book,
      'updated_at' => Carbon::now()
    ]);
    return redirect()->route('list_car')->with('success', "อัพเดทข้อมูลเรียบร้อยแล้ว");
  }

  public function bank()
  {
    $data_bank = DB::table('admin_banks')
    ->get();
    return view('admin.bank',compact('data_bank'));
  }

  public function insert_bank(Request $request)
  {
    DB::table('admin_banks')
    ->insert([
      'bank_name' => $request->bank_name,
      'bank_account_name' => $request->bank_account_name,
      'account_number' => $request->account_number,
      'bank_branch' => $request->bank_branch,  
      'created_at' => Carbon::now()
    ]);
    return redirect()->route('admin.bank')->with('success', "เพิ่มข้อมูลเรียบร้อยแล้ว");
  }

  public function delete_bank($id)
  {
    DB::table('admin_banks')
    ->where('id', '=', $id)
    ->delete();
    return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อยแล้ว");
  }

  public function payment_chk($id)
  {
    $user_payment = DB::table('user_payments')  
    ->join('member_booking_packages','user_payments.booking_id','=','member_booking_packages.booking_id')  
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get([
        'user_payments.booking_id',
        'user_payments.quotation_id',
        'user_payments.pay_num',
        'user_payments.payment_price',
        'user_payments.payment_bank',
        'user_payments.payment_slip',
        'user_payments.payment_status',
        'user_payments.created_at',
        'member_booking_packages.booking_id',
        'member_booking_packages.member_name',
        'member_booking_packages.booking_status'
      ]);
    return view('admin.payment_chk', compact('user_payment'));
  }

  public function update_payment($id, $pay_num)
  {
    if ($pay_num == 'pay1')
    {
    DB::table('user_payments')
      ->where('booking_id', '=', $id)
      ->update([
        'payment_status' => '2',
        'updated_at' => Carbon::now()
      ]);
    DB::table('member_booking_packages')
      ->where('booking_id', '=', $id)
      ->update([
        'booking_status' => '5',
        'updated_at' => Carbon::now()
      ]);
      $this->package_payment_mail1($id);
 
    }elseif ($pay_num == 'pay2'){
      DB::table('member_booking_packages')
      ->where('booking_id', '=', $id)
      ->update([
        'booking_status' => '7',
        'updated_at' => Carbon::now()
      ]);
      $this->package_payment_mail2($id);
    }
    return redirect()->route('booking_chk')->with('success', "ตรวจสอบยอดชำระเรียบร้อยแล้ว");
  }

  public function user_data()
  {
    $user_data = DB::table('users')
      ->where('is_admin', '=', '0')
      ->get();
    return view('admin.user_data', compact('user_data'));
  }

  public function user_data_booking($id)
  {
    $user_data_booking = DB::table('member_booking_packages')
      ->join('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->where('member_id', '=', $id)
      ->get();

    $user_profile = DB::table('users')
      ->where('id', '=', $id)
      ->get();
    return view('admin.user_detail', compact('user_data_booking', 'user_profile'));
  }

  public function admin_setting_condition ($id)
  {
    $condition = DB::table('package__conditions')
    ->where('id','=',1)
    ->get();
    return view('admin.admin_condition_setting',compact('condition'));
  }

  public function insert_condition (Request $request)
  {
    DB::table('package__conditions')
    ->where('id', '=', 1)
    ->update([
      'package_condition' => $request->package_condition,
      'updated_at' => Carbon::now()
    ]);
    return redirect()->route('admin_setting')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

  public function setting_update($id)
  {
    $admin_data =DB::table('users')
    ->where('id','=',$id)
    ->get();
    return view('admin.setting_update',compact('admin_data'));
  }

  public function data_update(Request $request, $id)
  {
    DB::table('users')
      ->where('id', '=', $id)
      ->update([
        'username' => $request->username,
        'member_name' => $request->member_name,
        'email' => $request->email,
        'updated_at' => Carbon::now()
      ]);
      return redirect()->route('admin_setting')->with('success', "แก้ไขข้อมูลเรียบร้อยแล้ว");
  }

  public function admin_update_password (Request $request)
  {
    $request->validate([
      'old_password' => 'required',
      'new_password' => 'required|confirmed',
    ]);

    #Match The Old Password
    if (!Hash::check($request->old_password, auth()->user()->password)) {
      return back()->with("error", "รหัสผ่านเก่าไม่ถูกต้อง!");
    }

    User::whereId(auth()->user()->id)->update([
      'password' => Hash::make($request->new_password)
    ]);
    return redirect()->route('admin_setting')->with('success', "เปลี่ยนรหัสผ่านเรียบร้อยแล้ว");
  }

  public function admin_invoice($id)
  {
    $invoice = DB::table('booking_quotations')
      ->join('member_booking_packages', 'booking_quotations.booking_id', '=', 'member_booking_packages.booking_id')
      ->join('package_tours', 'booking_quotations.package_id', '=', 'package_tours.package_id')
      ->join('users','member_booking_packages.member_id','=','users.id')
      ->where('booking_quotations.booking_id', '=', $id)
      ->get();
    return view('admin.invoice', compact('invoice'));
  }
 
  public function list_invoice()
  {
    $list_invoice = DB::table('member_booking_packages')
    ->join('package_tours','package_tours.package_id','=','member_booking_packages.package_id')
    ->join('booking_quotations','booking_quotations.booking_id','=','member_booking_packages.booking_id')
    ->where('member_booking_packages.booking_status','=','5')
    ->orderBy('booking_quotations.updated_at', 'desc')
    ->get();
    return view('admin.list_invoice',compact('list_invoice'));
  }

  public function car_rental_data()
  {
    $car_rent = DB::table('user_car_rents')
    ->orderBy('created_at', 'desc')
    ->get();
    return view('admin.car_rental_data',compact('car_rent'));
  }

  public function car_rental_detail($id)
  {
    $car_rent = DB::table('user_car_rents')
    ->where('rent_id','=',$id)    
    ->get();
    return view('admin.car_rental_detail',compact('car_rent'));
  }

  public function car_rental_quotation(Request $request,$id)
  {
    $quotation_id = 'C_'.date("ymd-hs");
    $car_file = $request->file('car_rental_file');

    if ($car_file) {
      //generate รูปภาพ
      $name_gen = hexdec(uniqid());
      //ดึงนามสกุลไฟล์ภาพ
      $pk_ext = strtolower($car_file->getClientOriginalExtension());
      $car_file_name = $name_gen . '.' . $pk_ext;

      //อัพโหลดและบันทึกข้อมูล
      $upload_location = 'public/package_file/';
      $full_path = $upload_location . $car_file_name;

      DB::table('car_rent_quotations')->insert([
        'rent_id' => $id,
        'car_quotation' => $quotation_id,
        'total_price' => $request->total_price,
        'price_deposit' => $request->price_deposit,
        'car_rental_file' => $full_path,
        'car_quotation_detail' => $request->car_quotation_detail,
        'created_at' => Carbon::now()
      ]);

      DB::table('user_car_rents')
      ->where('rent_id', '=', $id)
      ->update([
        'rent_status' => '1',
         'updated_at' => Carbon::now()
      ]);

      $car_file->move($upload_location, $car_file_name);
      return redirect()->route('admin.car_rental_data')->with('success', "ส่งใบเสนอราคาเรียบร้อยแล้ว");
    }else
    {
      DB::table('car_rent_quotations')->insert([
        'rent_id' => $id,
        'car_quotation' => $quotation_id,
        'total_price' => $request->total_price,
        'price_deposit' => $request->price_deposit,
        'car_rental_file' => 'none',
        'car_quotation_detail' => $request->car_quotation_detail,
        'created_at' => Carbon::now()
      ]);

      DB::table('user_car_rents')
      ->where('rent_id', '=', $id)
      ->update([
        'rent_status' => '1',
         'updated_at' => Carbon::now()
      ]);

      return redirect()->route('admin.car_rental_data')->with('success', "ส่งใบเสนอราคาเรียบร้อยแล้ว");
    }

  }

  public function car_rental_invoice($id)
  {
    $car_invoice = DB::table('user_car_rents')
    ->join('car_rent_quotations','user_car_rents.rent_id','=','car_rent_quotations.rent_id')
    ->where('car_rent_quotations.rent_id','=',$id)
    ->get();

    $data_bank =  DB::table('admin_banks')  
    ->get();

    return view('admin.car_rental_invoice',compact('car_invoice','data_bank'));
  }

  public function car_rental_payment_chk($id)
  {
    $car_payment = DB::table('car_rental_payments')
    ->join('user_car_rents','car_rental_payments.rent_id','=','user_car_rents.rent_id')
    ->where('car_rental_payments.rent_id','=',$id)
    ->get([
      'car_rental_payments.member_id',
      'car_rental_payments.code_pay',
      'car_rental_payments.rent_id as car_rent2',
      'car_rental_payments.payment_price',
      'car_rental_payments.payment_bank',
      'car_rental_payments.payment_slip',
      'car_rental_payments.pay_num',
      'car_rental_payments.created_at',
      'user_car_rents.rent_id',
      'user_car_rents.member_name',
      'user_car_rents.rent_status',
    ]);

    return view('admin.car_rental_payment_chk',compact('car_payment'));
  }

  public function car_update_payment($id,$pay_num)
  {
    if ($pay_num == 'pay1')
      {
        DB::table('user_car_rents')
          ->where('rent_id', '=', $id)
          ->update([
            'rent_status' => '3',
            'updated_at' => Carbon::now()
          ]);
          $this->car_rent_mail1($id);
      }elseif ($pay_num == 'pay2')
      {
        DB::table('user_car_rents')
          ->where('rent_id', '=', $id)
          ->update([
            'rent_status' => '6',
            'updated_at' => Carbon::now()
          ]);
          $this->car_rent_mail2($id);
      }
    return redirect()->route('admin.car_rental_data')->with('success', "ตรวจสอบยอดชำระเรียบร้อยแล้ว");
  }
//EMAIL
  public function car_rent_mail1 ($id)
  {
    $user_email = user_car_rent::where('rent_id','=',$id)->firstOrFail();  
    $email = $user_email->member_email; 
    Mail::to($email)->send(new ConfirmPayment_Pay1($user_email));
  }

  public function car_rent_mail2 ($id)
  {
    $user_email = user_car_rent::where('rent_id','=',$id)->firstOrFail();  
    $email = $user_email->member_email; 
    Mail::to($email)->send(new ConfirmPayment_Pay2($user_email));
  }

  public function package_payment_mail1 ($id)
  {
    $user_email = member_booking_package::where('booking','=',$id)->firstOrFail();  
    $email = $user_email->member_email; 
    Mail::to($email)->send(new ConfirmPayment_Package1($user_email));
  }

  public function package_payment_mail2 ($id)
  {
    $user_email = member_booking_package::where('booking','=',$id)->firstOrFail();  
    $email = $user_email->member_email; 
    Mail::to($email)->send(new ConfirmPayment_Package2($user_email));
  }


}
