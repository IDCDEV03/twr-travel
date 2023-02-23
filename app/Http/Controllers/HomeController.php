<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function home()
    {
        $package_home = DB::table('package_tours')
        ->where('package_status','=','1')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('home.index',compact('package_home'));
    }

    public function about_us()
    {
        return view('home.about-us');
    }

    public function package($id)
    {
        $package_tours = DB::table('package_tours')
        ->where('package_id','=', $id)
        ->get();

        $package_img = DB::table('package_imgs')
        ->where('package_id','=', $id)
        ->get();

        $condition = DB::table('package__conditions')
        ->where('id','=','1')
        ->get();
        return view('home.tour-details',compact('package_tours','package_img','condition'));
    }

    public function contact()
    {
        return view('home.contact');
    }
    public function service()
    {
        return view('home.service');
    }

    public function index() 
    {            
        return view('userpages.home');
    }

     public function web_car_rental()
    {
        return view('home.web_car');
    }
}
