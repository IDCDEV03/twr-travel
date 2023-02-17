<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

$controller_path = 'App\Http\Controllers';


Route::get('/', $controller_path . '\HomeController@home')->name('/');

Route::group(['middleware' => ['is_admin']], function() {
$controller_path = 'App\Http\Controllers';
//Route Admin
Route::get('/admin/list_package', $controller_path . '\AdminController@index')->name('list_package');
Route::get('/admin/add_package', $controller_path . '\AdminController@add_package')->name('add_package');
Route::post('/admin/save_package', [AdminController::class, 'save_package'])->name('save_package');
Route::get('/admin/list_car', $controller_path . '\AdminController@list_car')->name('list_car');
Route::get('/admin/add_car', $controller_path . '\AdminController@add_car')->name('add_car');
Route::post('/admin/add_listcar', $controller_path . '\AdminController@add_listcar')->name('add_listcar');
Route::get('/admin/edit_car/{id}', $controller_path . '\AdminController@edit_car')->name('edit_car');
Route::post('/admin/update_car/{id}', $controller_path . '\AdminController@update_car')->name('update_car');
//admin_ธนาคาร
Route::get('/admin/bank', $controller_path . '\AdminController@bank')->name('admin.bank');
Route::POST('/admin/insert_bank', $controller_path . '\AdminController@insert_bank')->name('admin.insert_bank');
Route::get('/admin/delete_bank/{id}', $controller_path . '\AdminController@delete_bank')->name('admin.delete_bank');


Route::get('/admin/index', $controller_path . '\AdminController@home')->name('admin_index');
Route::get('/admin/booking_chk', $controller_path . '\AdminController@booking_chk')->name('booking_chk');
Route::get('/admin/booking_cf/{id}', $controller_path . '\AdminController@booking_cf')->name('booking_cf');
Route::post('/admin/save_package', $controller_path . '\AdminController@save_package')->name('save_package');
Route::get('/admin/package_detail/{id}', $controller_path . '\AdminController@package_detail')->name('package_detail');
Route::get('/admin/edit_pk/{id}', $controller_path . '\AdminController@edit_pk')->name('edit_pk');
Route::get('/admin/edit_pk_img/{id}', $controller_path . '\AdminController@edit_pk_img')->name('edit_pk_img');
Route::post('/admin/update_package/{id}', $controller_path . '\AdminController@update_package')->name('admin.update_package');

//adminส่งใบเสนอราคา
Route::post('/admin/add_quotation/{id}', $controller_path . '\AdminController@add_quotation')->name('admin.quotation');

//ลบรูปภาพ
Route::get('/admin/package_img_delete/{id}', $controller_path . '\AdminController@package_img_delete')->name('admin.package_img_delete');

Route::post('/admin/update_img/{id}', $controller_path . '\AdminController@update_img')->name('admin.update_img');

//admin_setting
Route::get('/admin/setting', $controller_path . '\AdminController@admin_setting')->name('admin_setting');
Route::get('/admin/setting_update/{id}', $controller_path .'\AdminController@setting_update')->name('admin_setting_update');
Route::post('/admin/data_update/{id}', $controller_path .'\AdminController@data_update')->name('admin.data_update');
Route::POST('/admin/update_password', $controller_path . '\AdminController@admin_update_password')->name('admin.update_password');

//admin_ตรวจสอบยอดโอนชำระ
Route::get('/admin/payment_chk/{id}', $controller_path . '\AdminController@payment_chk')->name('admin.payment_chk');
//admin_บันทึกยอดโอนชำระ
Route::get('/admin/update_payment/{id}/{bkid}', $controller_path . '\AdminController@update_payment')->name('admin.update_payment');
//admin_userdata
Route::get('/admin/userdata', $controller_path . '\AdminController@user_data')->name('admin.user_data');
Route::get('/admin/userbooking/{id}', $controller_path . '\AdminController@user_data_booking')->name('admin.user_data_booking');

//admin_invoice
Route::get('/admin/invoice/{id}', $controller_path . '\AdminController@admin_invoice')->name('admin.invoice');
Route::get('/admin/list_invoice', $controller_path . '\AdminController@list_invoice')->name('admin.list_invoice');

//admin_เช่ารถ
Route::get('/admin/car_rental_data', $controller_path . '\AdminController@car_rental_data')->name('admin.car_rental_data');
Route::get('/admin/car_rental_detail/{id}', $controller_path . '\AdminController@car_rental_detail')->name('admin.car_rental_detail');
Route::POST('/admin/car_rental_quotation/{id}', $controller_path . '\AdminController@car_rental_quotation')->name('admin.car_rental_quotation');
Route::get('/admin/car_rental_invoice/{id}', $controller_path . '\AdminController@car_rental_invoice')->name('admin.car_rental_invoice');


});

//User
Route::get('/userpages/book_package/{id}/package/{pkid}', $controller_path . '\UserController@book_package')->name('book_package');

Route::get('/user/private_package/{id}', $controller_path . '\UserController@private_package')->name('private_package');

Route::post('/user/insert_booking', $controller_path . '\UserController@insert_booking')->name('insert_booking');
Route::get('/userpages/booking_status', $controller_path . '\UserController@booking_status')->name('booking_status');

Route::get('/user/booking_detail/{id}', $controller_path . '\UserController@booking_detail')->name('booking_detail');

Route::get('/user/quotation/{id}', $controller_path . '\UserController@user_quotation')->name('user_quotation');
Route::get('/user/payment/{id}', $controller_path . '\UserController@user_payment')->name('user_payment');

Route::post('/user/add_payment', $controller_path . '\UserController@add_payment')->name('user_payment');
//User_ลิสต์แพ็คเกจ
Route::get('/user/all_packages', $controller_path . '\UserController@all_packages')->name('user.all_packages');

//user_invoice
Route::get('/user/invoice/{id}', $controller_path . '\UserController@user_invoice')->name('user_invoice');

//user_ยกเลิกการของ
Route::get('/user/cancel_booking/{id}', $controller_path . '\UserController@user_cancel_booking')->name('cancel_booking');
//user_อัพเดทโปรไฟล์
Route::get('/user/profile', $controller_path . '\UserController@user_profile')->name('user_profile');
Route::POST('/user/update_profile/{id}', $controller_path . '\UserController@user_profile_update')->name('user_profile_update');
Route::get('/user/update_password', $controller_path . '\UserController@user_password')->name('user_password');
Route::POST('/user/change_password', $controller_path . '\UserController@update_password')->name('update_password');

//user_เช่ารถ
Route::get('/user/car-rental', $controller_path . '\UserController@car_rental')->name('user.car-rental');
Route::get('/user/car-rental-list', $controller_path . '\UserController@car_rental_list')->name('user.car-rental-list');
Route::get('/user/car-rental-detail/{id}', $controller_path . '\UserController@car_rent_detail')->name('user.rent_detail');
//user_บันทึกเช่ารถ
Route::post('/user/add-car-rent', $controller_path . '\UserController@add_car_rent')->name('user.add_car_rent');
Route::get('/user/car-rent-invoice/{id}', $controller_path . '\UserController@car_rent_invoice')->name('user.car_rent_invoice');
Route::get('/user/car-rent-payment/{id}', $controller_path . '\UserController@car_rent_payment')->name('user.car_rent_payment');
Route::POST('/user/insert_car_rent_payment/{id}', $controller_path . '\UserController@insert_car_rent_payment')->name('user.insert_car_rent_payment');

//HOME_FRONT-END
Route::get('/about-us', $controller_path . '\HomeController@about_us')->name('about_us.show');
Route::get('/contact', $controller_path . '\HomeController@contact')->name('contact.show');
Route::get('/service', $controller_path . '\HomeController@service')->name('service.show');
Route::get('/package/{id}', $controller_path . '\HomeController@package')->name('package.show');
Route::get('/bus-rental', $controller_path . '\HomeController@web_car_rental')->name('bus_rental.show');

//Route Register&Login
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('userPages.home');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});



//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
    Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');
});

Route::view('sample-page', 'pages.sample-page')->name('sample-page');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('layouts')->group(function () {
    Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'admin_unique_layouts.compact-small');
    Route::view('advance-type', 'admin_unique_layouts.advance-type');
    Route::view('material-layout', 'admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
});

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');
