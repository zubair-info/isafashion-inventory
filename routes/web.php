<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CompanyNameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaporController;
use App\Http\Controllers\MakingKnittingReceivedController;
use App\Http\Controllers\MakingKnittingSendController;
use App\Http\Controllers\SutaController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('protected', ['middleware' => ['auth', 'status']], [HomeController::class, 'index'])->name('home');


Route::get('/home', [HomeController::class, 'index'])->name('home');
//profile
Route::get('/user/list', [HomeController::class, 'userList'])->name('user');
Route::get('/userDelete/{id}', [HomeController::class, 'userDelete'])->name('user.delete');
Route::get('/changeStatus', [HomeController::class, 'userChangeStatus']);
Route::get('/profile/change', [HomeController::class, 'profileChange'])->name('profile.change');
Route::post('/profile/name/update', [HomeController::class, 'nameChange']);
Route::post('/profile/password/update', [HomeController::class, 'passwordUpdate']);
Route::post('/profile/picture/update', [HomeController::class, 'picture_update']);

// MakingKnittingSend
Route::get('making-knitting-send', [MakingKnittingSendController::class, 'index'])->name('making_knitting_send');
Route::post('making-knitting-send-store', [MakingKnittingSendController::class, 'store'])->name('KnittingSendStore');
Route::get('making-knitting-send-show', [MakingKnittingSendController::class, 'show'])->name('KnittingSendShow');
Route::get('making-knitting-send-edit/{knitting_send_id}', [MakingKnittingSendController::class, 'edit'])->name('KnittingSendEdit');
Route::post('making-knitting-send-update', [MakingKnittingSendController::class, 'update'])->name('KnittingSendUpdate');
Route::get('/knittingSendDelete/{id}', [MakingKnittingSendController::class, 'destroy'])->name('knittingSendDelete');


// MakingKnittingReceived
Route::get('making-knitting-recived', [MakingKnittingReceivedController::class, 'index'])->name('making_knitting_recived');
Route::post('making-knitting-recived-store', [MakingKnittingReceivedController::class, 'store'])->name('KnittingRecivedStore');
// Route::get('making-knitting-send-show', [MakingKnittingSendController::class, 'show'])->name('KnittingSendShow');
// Route::get('making-knitting-send-edit/{knitting_send_id}', [MakingKnittingSendController::class, 'edit'])->name('KnittingSendEdit');
// Route::post('making-knitting-send-update', [MakingKnittingSendController::class, 'update'])->name('KnittingSendUpdate');
// Route::get('/knittingSendDelete/{id}', [MakingKnittingSendController::class, 'destroy'])->name('knittingSendDelete');



// copmany name
Route::get('company-name', [CompanyNameController::class, 'index'])->name('companyName');
Route::post('company-name-store', [CompanyNameController::class, 'store'])->name('CompanyNameStore');
// Route::get('company-name-edit/{id}', [CompanyNameController::class, 'edit'])->name('CompanyNameEdit');
Route::post('company-name-update', [CompanyNameController::class, 'update'])->name('companyUpdate');
Route::get('/companyDelete/{id}', [CompanyNameController::class, 'destroy'])->name('companyDelete');


//brand
Route::get('brand-name', [BrandController::class, 'index'])->name('brandName');
Route::post('brand-name-store', [BrandController::class, 'store'])->name('brandNameStore');
Route::post('brand-name-update', [BrandController::class, 'update'])->name('brandUpdate');
Route::get('/brandDelete/{id}', [BrandController::class, 'destroy'])->name('brandDelete');


// suta
Route::get('suta-name', [SutaController::class, 'index'])->name('sutaName');
Route::post('suta-name-store', [SutaController::class, 'store'])->name('sutaNameStore');
Route::post('suta-name-update', [SutaController::class, 'update'])->name('sutaUpdate');
Route::get('/sutaDelete/{id}', [SutaController::class, 'destroy'])->name('sutaDelete');

// kapor
Route::get('kapor-name', [KaporController::class, 'index'])->name('kaporName');
Route::post('kapor-name-store', [KaporController::class, 'store'])->name('kaporNameStore');
Route::post('kapor-name-update', [KaporController::class, 'update'])->name('kaporUpdate');
Route::get('/kaporDelete/{id}', [KaporController::class, 'destroy'])->name('kaporDelete');
