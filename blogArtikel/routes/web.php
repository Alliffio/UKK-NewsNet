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

Auth::routes();


Route::get('/dashboard', 'BlogController@index');

// Route::get('/posting_isi', function(){
//     return view('blog.posting_isi');
// });

Route::get('/lapor-home', function(){
    return view('lapor.landingpage');
});

// Route::get('/lapor-list', function(){
//     return view('lapor.list');
// });


Route::group(['middleware' => 'CekLoginMiddleware'], function(){
    Route::get('/lapor', 'LaporsController@index')->name('lapor.index');
    Route::get('/lapor/create', 'LaporsController@create')->name('lapor.create');
    Route::post('/lapor/store', 'LaporsController@store')->name('lapor.store');
    Route::get('/lapor/edit/{id}', 'LaporsController@edit')->name('lapor.edit');
    Route::patch('/lapor/update/{id}', 'LaporsController@update')->name('lapor.update');
    Route::get('/laporr/tanggapans', 'LaporsController@tanggapans')->name('laporrs.tanggapans');
    Route::get('/logouts','OtentikasiController@logout')->name('logout');
});

Route::get('/','OtentikasiController@index')->name('logins');
Route::post('/login-user','OtentikasiController@login')->name('loginss');
Route::get('/regist','OtentikasiController@registrasi')->name('registers');
Route::post('/register-user','OtentikasiController@registerPost')->name('registerss');

Route::get('/isi-post/{slug}', 'BlogController@isi_post')->name('blog.isi');
Route::get('/list-post','BlogController@list_blog')->name('blog.list');
Route::get('/list-category/{category}','BlogController@list_category')->name('blog.category');
Route::get('/about','BlogController@about')->name('blog.about');
// Route::get('/gmaps', 'MapsController@gmaps');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tags', 'TagsController');

    //Route Posting
    Route::get('/posting/tampil_delete', 'PostingController@tampil_delete')->name('posting.tampil_delete');
    Route::get('/posting/restore/{id}', 'PostingController@restore')->name('posting.restore');
    Route::delete('/posting/kill/{id}', 'PostingController@kill')->name('posting.kill');
    Route::resource('/posting', 'PostingController');
    Route::resource('/user', 'UserController'); 

    //Route Laporan
    // Route::get('/lapor/tampil_delete', 'LaporController@tampil_delete')->name('lapors.tampil_delete');
    // Route::get('/lapor/restore/{id}', 'LaporController@restore')->name('lapor.restore');
    Route::delete('/lapor/kill/{id}', 'LaporController@kill')->name('lapor.kill');
    Route::get('/lapors', 'LaporController@tampil_lapor')->name('lapors.index'); 
    Route::get('/lapors/export_excel', 'LaporController@export_excel')->name('lapors.excel');
    Route::get('/lapors/cetak_pdf', 'LaporController@cetak_pdf')->name('lapors.pdf');
    Route::get('/lapors/tanggapan/', 'LaporController@tanggap')->name('lapor.tanggapans');
    Route::post('/lapors/tanggapan/store', 'LaporController@store_tanggap')->name('lapors.store_tanggap');

    Route::get('/lokasi', 'MapsController@index')->name('lokasi.index');
    Route::get('/lokasi/create', 'MapsController@create')->name('lokasi.create');Route::post('/lokasi/store', 'MapsController@store')->name('lokasi.store');
    Route::get('/lokasi/edit/{id}', 'MapsController@edit')->name('lokasi.edit');
    Route::post('/lokasi/update/{id}', 'MapsController@update')->name('lokasi.update');
    Route::delete('/lokasi/destroy/{id}', 'MapsController@edit')->name('lokasi.destroy');

    
    
});

