<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'Dashboard@index')->name('home.index');

    Route::get('/', 'Landing@home')->name('home');
    Route::get('/event', 'Landing@event')->name('event');
    Route::get('/event-detail/{params}', 'Landing@event_detail')->name('event-detail');

    Route::get('/kontak', 'Landing@kontak')->name('kontak');
    Route::get('/tentang', 'Landing@tentang')->name('tentang');

    Route::post('/like/{params}', 'Action@like')->name('like');
    Route::get('/get-like/{params}', 'Action@get_like')->name('get-like');
    Route::delete('/unlike/{params}', 'Action@unlike')->name('unlike');
    Route::post('/view/{params}', 'Action@view')->name('view');

    Route::get('/search', 'Landing@search')->name('search');

    Route::post('/daftar-event', 'Action@daftar')->name('daftar-event');

    Route::get('/absensi/{params}', 'Landing@absensi')->name('absensi');
    Route::post('/absensi-confirm/{params}', 'Landing@confirmAbsensi')->name('absensi-confirm');

    Route::get('/statistik', 'Landing@statistik_event')->name('statistik');
    Route::get('/get-statistik/{params?}', 'Landing@get_statistik')->name('get-statistik');
    Route::get('/get-statistik-jeniskelamin/{params?}', 'Landing@get_statistik_jeniskelamin')->name('get-statistik-jeniskelamin');

    Route::group(['prefix' => 'login', 'middleware' => ['guest'], 'as' => 'login.'], function () {
        Route::get('/login-akun', 'Auth@show')->name('login-akun');
        Route::post('/login-proses', 'Auth@login_proses')->name('login-proses');

        Route::post('/registrasi-user', 'Register@register')->name('registrasi-user');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
        Route::get('/dashboard-admin', 'Dashboard@dashboard_admin')->name('dashboard-admin');

        Route::get('/user', 'DataUser@index')->name('user');
        Route::get('/get-user', 'DataUser@get')->name('get-user');
        Route::get('/add-user', 'DataUser@add')->name('add-user');
        Route::post('/store-user', 'DataUser@store')->name('store-user');
        Route::get('/edit-user/{params}', 'DataUser@edit')->name('edit-user');
        Route::post('/update-user/{params}', 'DataUser@update')->name('update-user');
        Route::delete('/delete-user/{params}', 'DataUser@delete')->name('delete-user');

        Route::get('/event', 'EventController@index')->name('event');
        Route::get('/get-event', 'EventController@get')->name('get-event');
        Route::get('/add-event', 'EventController@add')->name('add-event');
        Route::post('/store-event', 'EventController@store')->name('store-event');
        Route::get('/edit-event/{params}', 'EventController@edit')->name('edit-event');
        Route::post('/update-event/{params}', 'EventController@update')->name('update-event');
        Route::delete('/delete-event/{params}', 'EventController@delete')->name('delete-event');
        Route::get('/button-event/{params}', 'EventController@update_tombol')->name('button-event');

        Route::get('/list-pendaftar/{params}', 'EventController@list_pendaftar')->name('list-pendaftar');
        Route::get('/get-list-pendaftar/{params}', 'EventController@get_list_pendaftar')->name('get-list-pendaftar');

        Route::get('/generateqrcode/{params}', 'EventController@generateQrCode')->name('generateqrcode');

        Route::get('/list-absen/{params}', 'EventController@list_absen')->name('list-absen');
        Route::get('/get-list-absen/{params}', 'EventController@get_list_absen')->name('get-list-absen');

        Route::get('/export-pendaftar/{params}', 'EventController@export_excel_pendaftar')->name('export-pendaftar');
        Route::get('/export-absen/{params}', 'EventController@export_excel_absen')->name('export-absen');

        Route::get('/daftarmakassar', 'DataMakassarController@index')->name('daftarmakassar');
        Route::get('/get-daftarmakassar', 'DataMakassarController@get')->name('get-daftarmakassar');
        Route::get('/add-daftarmakassar', 'DataMakassarController@add')->name('add-daftarmakassar');
        Route::post('/store-daftarmakassar', 'DataMakassarController@store')->name('store-daftarmakassar');
        Route::get('/edit-daftarmakassar/{params}', 'DataMakassarController@edit')->name('edit-daftarmakassar');
        Route::post('/update-daftarmakassar/{params}', 'DataMakassarController@update')->name('update-daftarmakassar');
        Route::delete('/delete-daftarmakassar/{params}', 'DataMakassarController@delete')->name('delete-daftarmakassar');
        Route::get('/moveup-daftarmakassar/{uuid}', 'DataMakassarController@moveUp')->name('moveup-daftarmakassar');
        Route::get('/movedown-daftarmakassar/{uuid}', 'DataMakassarController@moveDown')->name('movedown-daftarmakassar');
    });

    Route::get('/logout', 'Auth@logout')->name('logout');
});
