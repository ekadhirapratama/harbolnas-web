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

// Auth::routes();
Route::get('/', [PagesController::class, 'viewLanding']);
Route::get('/tentang-harbolnas', [PagesController::class, 'viewAbout']);
Route::get('/peserta-harbolnas', [PagesController::class, 'viewParticipant']);
Route::get('/peserta-harbolnas/detail', [PagesController::class, 'viewDetailParticipant']);
Route::get('/promo-partner', [PagesController::class, 'viewPromoPartner']);
Route::get('/mandiri', [PagesController::class, 'viewDetailPromoPartner']);
Route::get('/Cimb-niaga', [PagesController::class, 'viewDetailPromoPartner']);
Route::get('/experience-center', [PagesController::class, 'viewExperienceCenter']);
Route::get('/edisi-produk-lokal', [PagesController::class, 'viewProductLocal']);
// Route::get('/registrasi-peserta','PagesController@viewRegister');
Route::get('/promo/{type_id}/{category}/{page}/{limit}',[PagesController::class, 'getPromo']);

// Route::get('/dashboard', 'UserController@viewDashboard');
// Route::get('/account-setting', 'UserController@viewAccount');
// Route::get('/user-management', 'UserController@viewUser');
Route::group(['middleware' => 'auth:web'], function ($route){
  Route::get('/dashboard', [UserController::class, 'viewDashboard']);
  Route::get('/account-setting', [UserController::class, 'viewAccount']);
  Route::post('/account-setting/changepass', [UserController::class, 'changePass']);
  Route::post('/account-setting/editprofile', [UserController::class, 'editprofile']);
  Route::post('/dashboard/uploadbanner', [BannerController::class, 'create']);
  Route::get('/promo/{id}/view', [BannerController::class, 'getPromo']);
  Route::post('/promo/edit', [BannerController::class, 'edit']);
  Route::post('/promo/delete', [BannerController::class, 'delete']);

  Route::group(['middleware' => 'checkrole'], function ($route){
    Route::get('/user-management', [UserController::class, 'viewUser']);
    Route::post('/user-management/create', [UserController::class, 'create']);
    Route::get('/user-management/{id}/view', [UserController::class, 'getUser']);
    Route::post('/user-management/edituser', [UserController::class, 'edit']);
    Route::post('/user-management/destroy', [UserController::class, 'destroy']);
  });
});
