<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// authentication routes
Auth::routes();

// content page routes
Route::controller(PagesController::class)->group(function ($route) {
  Route::get('/', 'viewLanding')->name('landing');
  Route::get('/tentang-harbolnas', 'viewAbout');
  Route::get('/peserta-harbolnas', 'viewParticipant');
  Route::get('/peserta-harbolnas/detail', 'viewDetailParticipant');
  Route::get('/promo-partner', 'viewPromoPartner');
  Route::get('/mandiri', 'viewDetailPromoPartner');
  Route::get('/Cimb-niaga', 'viewDetailPromoPartner');
  Route::get('/experience-center', 'viewExperienceCenter');
  Route::get('/edisi-produk-lokal', 'viewProductLocal');
  Route::get('/registrasi-peserta', 'viewRegister');
  Route::get('/promo/{type_id}/{category}/{page}/{limit}', 'getPromo');
});

// logged in user routes
Route::group(['middleware' => 'auth:web'], function ($route){
  Route::controller(BannerController::class)->group(function ($route) {
    Route::post('/dashboard/uploadbanner', 'create');
    Route::get('/promo/{id}/view', 'getPromo');
    Route::post('/promo/edit', 'edit');
    Route::post('/promo/delete', 'delete');
  });
  
  Route::controller(UserController::class)->group(function ($route) {
    Route::get('/dashboard', 'viewDashboard');
    Route::get('/account-setting', 'viewAccount');
    Route::post('/account-setting/changepass', 'changePass');
    Route::post('/account-setting/editprofile', 'editProfile');

    Route::group(['middleware' => 'checkrole'], function ($route){
      Route::get('/user-management', 'viewUser');
      Route::post('/user-management/create', 'create');
      Route::get('/user-management/{id}/view', 'getUser');
      Route::post('/user-management/edituser', 'edit');
      Route::post('/user-management/destroy', 'destroy');
    });
  });
});
