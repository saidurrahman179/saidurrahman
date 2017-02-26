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
//hospital/admin/link



//*******************Route for font_end*********************************

//Route for home controller
Route::get('/','font_end\homeController');


//*******************Route for back_end*********************************

//Route for admin panel
Route::get('admin','back_end\adminController');


//route for specialities

Route::get('manage/speciality', 'back_end\SpecialityController');
Route::post('manage/speciality', 'back_end\SpecialityController@sotre');
Route::get('delete/speciality/{id}', 'back_end\SpecialityController@deleteSpeciality');
Route::post('update/speciality/{id}', 'back_end\SpecialityController@updateSpeciality');
Route::get('all/speciality','back_end\SpecialityController@allSpeciality');

//route for country
Route::get('manage/country', 'back_end\countryController');
Route::post('manage/country', 'back_end\countryController@sotre');
Route::get('delete/country/{id}', 'back_end\countryController@deleteController');
Route::post('update/country/{id}', 'back_end\countryController@updateController');
Route::get('all/country','back_end\countryController@allCountry');


//route for city
Route::get('manage/city', 'back_end\cityController');
Route::post('manage/city', 'back_end\cityController@sotre');
Route::get('delete/city/{id}', 'back_end\cityController@deleteCity');
Route::post('update/city/{id}', 'back_end\cityController@updateController');
Route::get('all/city','back_end\cityController@allCity');

//route for area
Route::get('manage/area', 'back_end\areaController');
Route::get('all/city/by/country/{id}', 'back_end\areaController@selectCity');
Route::post('manage/area', 'back_end\areaController@sotre');
Route::get('delete/area/{id}', 'back_end\areaController@deleteArea');
// Route::post('update/area/{id}', 'back_end\areaController@updateController');
Route::get('all/area','back_end\areaController@allArea');

//route for specialities

Route::get('manage/doctor', 'back_end\doctorController');
Route::post('manage/doctor', 'back_end\doctorController@sotre');
Route::get('all/area/by/country/{id}', 'back_end\areaController@selectArea');
// Route::get('delete/doctor/{id}', 'back_end\doctorController@deleteDoctor');
// Route::post('update/doctor/{id}', 'back_end\doctorController@updateDoctor');
Route::get('all/doctor', 'back_end\doctorController@allDoctor');