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

Route::match(['get','post'],'/add','SheenamController@add');
Route::match(['get','post'],'/sub','SheenamController@sub');
Route::match(['get','post'],'/multi','SheenamController@multi');

Route::match(['get','post'],'/index','LaravelController@index');

Route::match(['get','post'],'/medhome','MedicalController@medicalhome');
Route::match(['get','post'],'/editmed','MedicalController@edit_medical');
Route::match(['get','post'],'/editmed1','MedicalController@edit_medical1');
Route::match(['get','post'],'/delmed','MedicalController@delete_med');
Route::match(['get','post'],'/delmed1','MedicalController@delete_med1');
Route::match(['get','post'],'/showmed','MedicalController@show_medical');
Route::match(['get','post'],'/medreg','MedicalController@medical_reg');
Route::match(['get','post'],'/medireg','MedicalController@medicine_reg');
Route::match(['get','post'],'/medpass','MedicalController@change_password');
Route::match(['get','post'],'/manage','MedicalController@manage_med');
Route::match(['get','post'],'/edit','MedicalController@edit_medicine');
Route::match(['get','post'],'/edit1','MedicalController@edit_medicine1');
Route::match(['get','post'],'/delete','MedicalController@delete_medicine');
Route::match(['get','post'],'/delete1','MedicalController@delete_medicine1');
Route::match(['get','post'],'/comp','MedicalController@competitor');
Route::match(['get','post'],'/search','MedicalController@search');

Route::match(['get','post'],'/index','LoginController@index');
Route::match(['get','post'],'/about','LoginController@about');
Route::match(['get','post'],'/contact','LoginController@contact');
Route::match(['get','post'],'/login','LoginController@login');
Route::match(['get','post'],'/logout','LoginController@logout');
Route::match(['get','post'],'/logerror','LoginController@login_error');
Route::match(['get','post'],'/auth_error','LoginController@auth_error');

Route::get('admin_home','AdminController@admin_home');
Route::match(['get','post'],'/admin_reg','AdminController@admin_reg');
Route::match(['get','post'],'/show','AdminController@show_admins');
Route::match(['get','post'],'/edit_admin','AdminController@edit_admins');
Route::match(['get','post'],'/edit_admin1','AdminController@edit_admins1');
Route::match(['get','post'],'change','AdminController@change_password');
Route::match(['get','post'],'upload_photo','AdminController@upload_photo');
Route::match(['get','post'],'adminprofile','AdminController@admin_profile');
Route::match(['get','post'],'change_adminphoto','AdminController@change_admin_photo');



Route::match(['get','post'],'/+','MathController@addition');



Route::get('/', function () {
    return view('welcome');
});
