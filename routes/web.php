<?php

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

Auth::routes();


  Route::get('/home', 'HomeController@index')->name('home');

 

Route::group(['prefix' => 'student'], function () {
 // student controller
  Route::resource('registerUnits', 'RegisterUnitController');

 Route::get('/create', 'HomeController@create')->name('createUnit');

  Route::post('/store', 'HomeController@store')->name('storeUnit');
 

});

Route::group(['prefix' => 'admin'], function () {

  // redirect admin on click logo
  Route::get('/home', function(){
    return view('welcome');
  });

  // student controller
  Route::resource('student', 'StudentController');
  
  // school controller
  Route::resource('school', 'SchoolController');

   // course controller
  Route::resource('course', 'CourseController'); 

  // department controller
  Route::resource('department', 'DepartmentController');
  
   // fee controller
  Route::resource('fee', 'FeeController');

   // unit controller
  Route::resource('unit', 'UnitController');

  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {

  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('student.login');
  // Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('student.logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});
