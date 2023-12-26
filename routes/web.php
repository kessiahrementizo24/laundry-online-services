<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DetergentController;
use App\Http\Controllers\FabricController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\RiderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// user auth login/register
    Route::post('/register',[AuthController::class, 'registerPost'])->name('register');
    Route::get('/login',[AuthController::class, 'login']);
    Route::post('/login',[AuthController::class, 'authenticate']);
    Route::get('/forgotPassword',[AuthController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgotPassword',[AuthController::class, 'forgotPasswordPost'])->name('forgotPassword');

// Route::group(['middleware' => 'auth'], function (){
   Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
   Route::get('/home',[HomeController::class,'home'])->name('user.home');
   Route::get('/user/book',[HomeController::class,'book'])->name('user.book');
   Route::get('/user/order',[OrderController::class,'index'])->name('user.order');
   Route::post('/user/book', [OrderController::class,'store']);
   Route::get('/user/about',[HomeController::class,'about'])->name('user.about');

// });


//admin login
Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'admin.auth.login')->name('login');
        Route::post('login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/dashboard', 'admin.dashboard')->name('home');
        Route::post('/logout_handler',[AdminController::class, 'logoutHandler'])->name 
        ('logout_handler');

        
    });

});




//admin routes
Route::get('admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
Route::get('admin/order',[AdminDashboardController::class,'order'])->name('admin.order');
Route::put('admin/update-order',[OrderController::class,'update']);
Route::get('admin/detergent',[AdminDashboardController::class, 'detergent'])->name('admin.detergent');
Route::get('admin/transaction-history',[AdminDashboardController::class, 'history']);


//fabric route
Route::get('/admin/fabric',[FabricController::class,'fabric'])->name('admin.fabric.fabric');
Route::get('fabric/create',[FabricController::class,'create'])->name('fabric.create');
Route::post('fabric/submit',[FabricController::class,'submit'])->name('fabric.submit');
Route::get('fabric/edit/{id}',[FabricController::class,'edit'])->name('fabric.edit');
Route::post('fabric/update/{id}',[FabricController::class,'update'])->name('fabric.update');
Route::delete('fabric/delete/{id}',[FabricController::class,'destroy'])->name('fabric.destroy');




//detergent route
Route::get('/admin/detergent',[DetergentController::class,'detergent'])->name('admin.detergent.detergent');
Route::get('detergent/create',[DetergentController::class,'create'])->name('detergent.create');
Route::post('detergent/submit',[DetergentController::class,'submit'])->name('detergent.submit');
Route::get('detergent/edit/{id}',[DetergentController::class,'edit'])->name('detergent.edit');
Route::post('detergent/update/{id}',[DetergentController::class,'update'])->name('detergent.update');
Route::delete('detergent/delete/{id}',[DetergentController::class,'destroy'])->name('detergent.destroy');


//rider-side route
Route::prefix('/riderapp')->group(function(){
    
    Route::get('/login', [RiderController::class, 'login'])->name('login');
    Route::post('/login', [RiderController::class, 'authenticate']);
    
    Route::get('/dashboard', [RiderController::class, 'dashboard']);
    Route::get('/bookings', [RiderController::class, 'bookings'])->name('riderapp.bookings');

    Route::put('/update-order', [OrderController::class, 'update']);

    Route::group(['middleware'=> 'rider'], function(){
        
        
    });
   
});

Route::get('/bookings/pending', [RiderController::class, 'pending']);
Route::get('/bookings/pick-up', [RiderController::class, 'pick_up']);
Route::get('/bookings/delivery', [RiderController::class, 'delivery']);

Route::get('/rider/dashboard', [RiderController::class, 'dashboard']);
Route::get('/rider/bookings/{category?}', [RiderController::class, 'bookings']);
Route::get('/rider/login', [RiderController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register',[AuthController::class, 'register']);
