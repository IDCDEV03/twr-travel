<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\member_booking_package;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\user_car_rent;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\BookingConfirm;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
  public function book_package($id,$pkid)
  {
    $users = DB::table('users')
      ->where('id', '=', $id)
      ->get();
    $package_all = DB::table('package_tours')
      ->where('package_id', '=', $pkid)
      ->get();
    return view('userpages.book_package', compact('package_all', 'users'));
  }

  public function private_package($id)
  {
    $users = DB::table('users')
      ->where('id', '=', $id)
      ->get();
    $package_all = DB::table('package_tours')
      ->where('package_status', '=', '1')
      ->get();
    return view('userpages.private_package', compact('package_all', 'users'));
  }

  public function insert_booking(Request $request)
  {

    $ิbooking_id = Str::random(12);

    //บันทึกข้อมูล
    member_booking_package::insert([
      'booking_id' => $ิbooking_id,
      'member_id' => $request->member_id,
      'member_name' => $request->member_name,
      'member_email' => $request->member_email,
      'package_id' => $request->package_id,
      'number_of_travel' => $request->number_of_travel,
      'date_start' => $request->date_start,
      'date_end' => $request->date_end,
      'member_detail' => $request->member_detail,
      'member_contact' => $request->member_contact,
      'booking_status' => '0',
      'created_at' => Carbon::now()
    ]);

    $this->booking_mail($request->member_id);

    return redirect()->route('userPages.home')->with('success', "บันทึกข้อมูลการสั่งจองเรียบร้อยแล้ว กรุณารอเจ้าหน้าที่ตรวจสอบ");
  }

  public function booking_mail ($id)
  {
    $user_email = User::find($id);  
    $email = $user_email->email; 
    Mail::to($email)->send(new BookingConfirm($user_email));
  }

  

  public function booking_status()
  {
    $user_id = Auth::user()->id;

    $list_booking = DB::table('member_booking_packages')
      ->join('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->where('member_booking_packages.member_id', '=', $user_id)
      ->orderBy('member_booking_packages.created_at', 'desc')
      ->get();
    return view('userpages.booking_status', compact('list_booking'));
  }

  public function booking_detail($id)
  {
    $booking_detail = DB::table('member_booking_packages')
      ->join('package_tours', 'member_booking_packages.package_id', '=', 'package_tours.package_id')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();
    return view('userpages.booking_detail', compact('booking_detail'));
  }

  public function user_quotation($id)
  {
    $user_quotation = DB::table('member_booking_packages')
      ->join('booking_quotations', 'member_booking_packages.booking_id', '=', 'booking_quotations.booking_id')
      ->join(
        'package_tours',
        'member_booking_packages.package_id',
        '=',
        'package_tours.package_id'
      )
      ->join('users','member_booking_packages.member_id','=','users.id')
      ->where('member_booking_packages.booking_id', '=', $id)
      ->get();
    return view('userpages.booking_quotation', compact('user_quotation'));
  }

  public function user_payment($id)
  {
    $payment = DB::table('booking_quotations')
      ->where('booking_quotations.quotation_id', '=', $id)
      ->get();
    return view('userpages.user_payment', compact('payment'));
  }

  public function add_payment(Request $request)
  {
    $request->validate(
      [
        'payment_slip.*' => 'mimes:jpg,jpeg,png|max:2048',
        'payment_slip' => 'required',
        'payment_price' => 'required',
        'payment_bank' => 'required'

      ],
      [
        'payment_slip.required' => "กรุณาเพิ่มรูปภาพสลิปการโอน",
        'payment_price.required' => "กรุณาระบุยอดโอนชำระ",
        'payment_bank.required' => "กรุณาเลือกธนาคารที่ท่านโอนชำระ"
      ]
    );

    $payment_slip = $request->file('payment_slip');
    $name_gen = hexdec(uniqid());
    $payment_ext = strtolower($payment_slip->getClientOriginalExtension());
    $payment_slip_name = $name_gen . '.' . $payment_ext;
    $upload_location = 'public/package_file/';
    $full_path = $upload_location . $payment_slip_name;

    DB::table('user_payments')->insert(
      [
        'user_id' => $request->user_id,
        'quotation_id' => $request->quotation_id,
        'payment_price' => $request->payment_price,
        'payment_bank' => $request->payment_bank,
        'payment_slip' => $full_path,
        'payment_status' => '1',
        'created_at' => Carbon::now()
      ]
    );

    DB::table('booking_quotations')
      ->where('quotation_id', '=', $request->quotation_id)
      ->update([
        'quotation_status' => '1',
        'updated_at' => Carbon::now()
      ]);

    DB::table('member_booking_packages')
      ->where('booking_id', '=', $request->booking_id)
      ->update([
        'booking_status' => '4',
        'updated_at' => Carbon::now()
      ]);

    $payment_slip->move($upload_location, $payment_slip_name);
    return redirect()->route('booking_status')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }


  public function user_invoice($id)
  {
    $invoice = DB::table('booking_quotations')
      ->join('member_booking_packages', 'booking_quotations.booking_id', '=', 'member_booking_packages.booking_id')
      ->join('package_tours', 'booking_quotations.package_id', '=', 'package_tours.package_id')
      ->join('users','member_booking_packages.member_id','=','users.id')
      ->where('booking_quotations.booking_id', '=', $id)
      ->get();
    return view('userpages.user_invoice', compact('invoice'));
  }

  public function user_cancel_booking($id)
  {
    DB::table('booking_quotations')
      ->where('booking_id', '=', $id)
      ->update([
        'quotation_status' => '4',
        'updated_at' => Carbon::now()
      ]);

    DB::table('member_booking_packages')
      ->where('booking_id', '=', $id)
      ->update([
        'booking_status' => '2',
        'updated_at' => Carbon::now()
      ]);
    return redirect()->route('booking_status')->with('cancel', "ยกเลิกการจองเรียบร้อยแล้ว");
  }

  public function user_profile()
  {
    $user_profile = DB::table('users')
      ->where('id', '=', Auth::user()->id)
      ->get();
    return view('userpages.user_profile_update', compact('user_profile'));
  }

  public function user_profile_update(Request $request, $id)
  {
    DB::table('users')
      ->where('id', '=', $id)
      ->update([
        'username' => $request->username,
        'member_name' => $request->member_name,
        'email' => $request->email,
        'user_phone' => $request->user_phone,
        'updated_at' => Carbon::now()
      ]);
    return redirect()->route('user_profile')->with('success', "แก้ไขข้อมูลเรียบร้อยแล้ว");
  }

  public function user_password()
  {
    $user_password = DB::table('users')
      ->where('id', '=', Auth::user()->id)
      ->get();
    return view('userpages.user_password_update', compact('user_password'));
  }

  public function update_password(Request $request)
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
    return back()->with("status", "เปลี่ยนรหัสผ่านเรียบร้อยแล้ว!");
  }

  public function all_packages(Request $request)
  {
    $search = $request['search'] ?? "";
    if ($search != "")
    {
      $all_packages = DB::table('package_tours')
      ->where('package_name','LIKE',"%$search%")
      ->orderBy('created_at', 'desc')
      ->get();
    }else{
      $all_packages = DB::table('package_tours')
      ->where('package_status','=','1')
      ->orderBy('created_at', 'desc')
      ->get();
    }
  
    return view('userpages.all_packages', compact('all_packages','search'));
  }

  //เช่ารถ
  public function car_rental()
  {
    $province = DB::table('provinces')
    ->orderBy('name_th', 'ASC')
    ->get();
    return view('userpages.car_rent',compact('province'));
  }

  public function car_rental_list()
  {
    $user_id = Auth::user()->id;
    $car_rent = DB::table('user_car_rents')
    ->where('member_id','=',$user_id)
    ->get();
    return view('userpages.car_rent_list', compact('car_rent'));
  }

  public function car_rent_detail($id)
  {
    $car_rent = DB::table('user_car_rents')
    ->where('rent_id','=',$id)
    ->get();
    return view('userpages.car_rent_detail',compact('car_rent'));
  }

  public function add_car_rent(Request $request)
  {
      $ิrent_id = Str::random(8);
      $data = $request->all();
      $data['created_at'] = Carbon::now();
      $data['rent_id'] = $ิrent_id;
      $data['rent_status'] = '0';

      user_car_rent::create($data);

      return redirect()->route('user.car-rental-list')->with('success', "บันทึกข้อมูลเรียบร้อยแล้ว");
  }

}
