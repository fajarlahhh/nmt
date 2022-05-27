<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function () {
  Route::post('/gantisandi', [App\Http\Controllers\PasswordController::class, 'submit'])->name('gantisandi');
  Route::group(['middleware' => ['member']], function () {
    Route::group(['middleware' => ['active']], function () {
      Route::get('/', function () {
        return redirect('/dashboard');
      });
      Route::get('/dashboard', \App\Http\Livewire\Member\Dashboard::class);
      Route::prefix('downline')->group(function () {
        Route::get('/', \App\Http\Livewire\Member\Downline\Index::class);
        Route::get('/new', \App\Http\Livewire\Member\Downline\Form::class);
      });
      Route::get('/pin', \App\Http\Livewire\Member\Pin::class);
      Route::get('/profile', \App\Http\Livewire\Member\Profile::class);
    });
    Route::group(['middleware' => ['inactive']], function () {
      Route::get('/activation', \App\Http\Livewire\Member\Activation::class);
    });
  });

  Route::group(['middleware' => ['admin']], function () {
    Route::prefix('admin-area')->group(function () {
      Route::get('/', function () {
        return redirect('/admin-area/dashboard');
      });
      Route::get('/dashboard', \App\Http\Livewire\Administrator\Dashboard::class);
      Route::get('/payment', \App\Http\Livewire\Administrator\Deposit::class);
      Route::get('/withdrawal', \App\Http\Livewire\Administrator\Withdrawal::class);
      Route::get('/member', \App\Http\Livewire\Administrator\Member::class);
      Route::get('/security', \App\Http\Livewire\Administrator\Security::class);
      Route::get('/information', \App\Http\Livewire\Administrator\Information\Index::class);
      Route::get('/information/add', \App\Http\Livewire\Administrator\Information\Add::class);
    });
  });
});

Route::get('/registration', \App\Http\Livewire\Registration::class);
Route::get('/forgot', \App\Http\Livewire\Forgot::class);
Route::get('/recovery', \App\Http\Livewire\Recovery::class);
