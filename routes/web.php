<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
     if(Auth::check()){
          return redirect()->route('contacts.index');
      }else{
          return redirect()->route('login')->withSuccess('Opps! You do not have access');
      }
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('contacts', ContactController::class)->middleware('auth');


  