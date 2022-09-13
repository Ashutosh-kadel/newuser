<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

// <form method="POST" action="{{ route('logout') }}">
//                             @csrf

//                             <x-dropdown-link :href="route('logout')"
//                                     onclick="event.preventDefault();
//                                                 this.closest('form').submit();">
//                                 {{ __('Log Out') }}
//                             </x-dropdown-link>
//                         </form>
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// Route::middleware('auth','guest')->group(function () {

    // Admin Panel Route
    Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){
        Route::get('/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/register-user', function () {
            return view('admin.registerUser');
        })->name('admin.registerUser');
        Route::get('/change_status/{id}/{status}', [AdminController::class,'changeStatus'])->name('admin.changeStatus');
        Route::get('/update_profile', function () {
            return view('admin.updateDetail');
        })->name('admin.viewProfileUpdatePage'); 
        Route::get('/update_password', function () {
                return view('admin.updatePassword');
            })->name('admin.viewPasswordUpdatePage'); 
        Route::post('/update_profile', [UserController::class,'updateDetails'])->name('admin.updateDetails'); 
        Route::post('/update_password', [UserController::class,'updatePassword'])->name('admin.updatePassword');
        Route::get('/view_user/{id}', [AdminController::class,'viewUser'])->name('admin.viewUser');
        Route::post('/new-user', [adminController::class,'storeUser'])->name('admin.storeUser'); 
    });




    // User Panel Route
    Route::prefix('/user')->middleware(['auth','isUser'])->group(function(){
        Route::get('/dashboard', [UserController::class,'index'])->name('user.dashboard'); 
        Route::get('/update_profile', function () {
                return view('user.updateDetail');
            })->name('user.viewProfileUpdatePage'); 
        Route::get('/update_password', function () {
                return view('user.updatePassword');
            })->name('user.viewPasswordUpdatePage'); 
        Route::post('/update_profile', [UserController::class,'updateDetails'])->name('user.updateDetails'); 
        Route::post('/update_password', [UserController::class,'updatePassword'])->name('user.updatePassword'); 
        
    });


// });


require __DIR__.'/auth.php';
