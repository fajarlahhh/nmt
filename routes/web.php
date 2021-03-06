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
    Route::get('/', function () {
      return redirect('/dashboard');
    });
    Route::get('/dashboard', \App\Http\Livewire\Member\Dashboard::class);
    Route::get('/withdrawal', \App\Http\Livewire\Member\Withdrawal::class);
    Route::prefix('downline')->group(function () {
      Route::get('/', \App\Http\Livewire\Member\Downline\Index::class);
      Route::get('/new', \App\Http\Livewire\Member\Downline\Form::class);
    });
    Route::get('/pin', \App\Http\Livewire\Member\Pin::class);
    Route::get('/profile', \App\Http\Livewire\Member\Profile::class);
    Route::get('/security', \App\Http\Livewire\Member\Security::class);
    Route::get('/bonus', \App\Http\Livewire\Member\Bonus::class);
    Route::get('/renewal', \App\Http\Livewire\Member\Renewal::class);
    Route::get('/deposit', \App\Http\Livewire\Member\Deposit::class);
    Route::get('/balance', \App\Http\Livewire\Member\Balance::class);
  });

  Route::group(['middleware' => ['admin']], function () {
    Route::prefix('admin-area')->group(function () {
      Route::get('/', function () {
        return redirect('/admin-area/dashboard');
      });
      Route::get('/dashboard', \App\Http\Livewire\Administrator\Dashboard::class);
      Route::get('/withdrawal', \App\Http\Livewire\Administrator\Withdrawal::class);
      Route::get('/member', \App\Http\Livewire\Administrator\Member::class);
      Route::get('/deposit', \App\Http\Livewire\Administrator\Deposit::class);
      Route::get('/daily', \App\Http\Livewire\Administrator\Daily::class);
      Route::get('/security', \App\Http\Livewire\Administrator\Security::class);
      Route::get('/pin', \App\Http\Livewire\Administrator\Pin::class);
    });
  });
});

Route::get('/registration', \App\Http\Livewire\Registration::class);
Route::get('/forgot', \App\Http\Livewire\Forgot::class);
Route::get('/recovery', \App\Http\Livewire\Recovery::class);

Route::view('/policy', 'pages.policy');
