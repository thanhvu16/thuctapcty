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

Route::prefix('hethong')->group(function() {

});
Route::get('tao-giao-vu-admin', 'HeThongController@taoGiaoVuAdmin')->name('taoGiaoVuAdmin');
Route::get('danh-sach-giao-vu', 'HeThongController@DSGiaoVuAdmin')->name('DSGiaoVuAdmin');
Route::get('phan-cong', 'HeThongController@phanCong')->name('phanCong');
Route::post('post-phan-cong/{id}', 'HeThongController@postphanCong')->name('postphanCong');

Route::get('tao-sinh-vien', 'HeThongController@taoSV')->name('taoSV');
Route::get('danh-sach-sinh-vien', 'HeThongController@DSSV')->name('DSSV');

Route::get('tao-giao-vien-hd', 'HeThongController@taoGiaoVienHD')->name('taoGiaoVienHD');
Route::get('danh-sach-giao-vien-hd', 'HeThongController@DSGiaoVienHD')->name('DSGiaoVienHD');

Route::get('tao-doanh-nghiep', 'HeThongController@taoDoanhNghiep')->name('taoDoanhNghiep');
Route::get('danh-sach-doanh-nghiep', 'HeThongController@DSDoanhNghiep')->name('DSDoanhNghiep');
