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

Route::prefix('dangky')->group(function() {
    Route::get('/', 'DangKyController@index');
});
Route::resource('dang-ky', 'DangKyController');
Route::resource('doanh-nghiep', 'DoanhNghiepController');
Route::get('duyet-sinh-vien-gui-doanh-nghiep', 'DangKyController@NhaTruong')->name('nhaTruong');
Route::post('xoa-doanh-nghiep/delete/{id}', array('as' => 'xoaDN', 'uses' => 'DoanhNghiepController@destroy'));
Route::post('xoa-sinh-vien/delete/{id}', array('as' => 'xoaSV', 'uses' => 'DoanhNghiepController@XoaSV'));
Route::post('duyet-sinh-vien', array('as' => 'duyetSVNhaTruong', 'uses' => 'DoanhNghiepController@duyetSVNhaTruong'));
Route::post('duyet-sinh-vien-doanh-nghiep', array('as' => 'duyetSVDoanhNghiep', 'uses' => 'DoanhNghiepController@duyetSVDoanhNghiep'));
Route::get('quan-ly-sinh-vien', 'DangKyController@sinhVien')->name('quanly');

//công việc
Route::resource('cong-viec', 'GiaoViecController');
Route::resource('xu-ly', 'XuLyController');
Route::get('danh-sach-cong-viec-da-giao', 'GiaoViecController@congViecDaGiao')->name('congViecDaGiao');
Route::get('danh-sach-cong-viec-sinh-vien-hoan-thanh-cho-duyet', 'GiaoViecController@congViecDaHoanThanhChoDuyet')->name('congViecDaHoanThanhChoDuyet');
Route::get('danh-sach-cong-viec-sinh-vien-cho-duyet', 'GiaoViecController@congViecDaHoanThanhSVChoDuyet')->name('congViecDaHoanThanhSVChoDuyet');
Route::get('danh-gia-cuoi-ky-thuc-tap', 'GiaoViecController@danhGiaCuoiKy')->name('danhGiaCuoiKy');
Route::get('thong-ke', 'GiaoViecController@thongKeXepLoai')->name('thongKeXepLoai');
Route::get('danh-sach-da-danh-gia-cuoi-ky-thuc-tap', 'GiaoViecController@daDanhGiaCuoiKy')->name('daDanhGiaCuoiKy');
Route::get('nhap-diem-sinh-vien-cuoi-ky', 'GiaoViecController@nhapDiemCuoiKy')->name('nhapDiemCuoiKy');
Route::get('da-nhap-diem', 'GiaoViecController@danhapDiemCuoiKy')->name('danhapDiemCuoiKy');
Route::post('danh-gia-cuoi-ku/{id}', 'GiaoViecController@postDanhGiaCuoiKy')->name('postDanhGiaCuoiKy');
Route::post('nhap-diem-cuoi-ku/{id}', 'GiaoViecController@postNhapDiemCuoiKy')->name('postNhapDiemCuoiKy');
Route::get('danh-sach-cong-viec-hoan-thanh', 'GiaoViecController@congViecDaHoanThanh')->name('congViecDaHoanThanh');
Route::get('{id}/cap-nhat-cv.html', 'GiaoViecController@capNhatCV')->name('capNhatCV');
Route::get('danh-sach-cong-viec-da-nhan', 'GiaoViecController@congViecDaNhan')->name('congViecDaNhan');
Route::get('danh-sach-cong-viec-da-nhan-hoan-thanh', 'GiaoViecController@congViecDaNhanHT')->name('congViecDaNhanHT');
Route::get('lay-bai-viet', 'GiaoViecController@JSBaiViet')->name('JSBaiViet');
Route::post('cap-nhat-ket-qua-giao-viec/{id}', 'GiaoViecController@capNhatKetQua')->name('capNhatKetQua');
Route::post('cap-nhat-ket-qua-hoan-thanh/{id}', 'GiaoViecController@capNhatHT')->name('capNhatHT');
Route::get('{id}/cap-nhat-cv-hoan-thanh.html', 'GiaoViecController@capNhatCVHT')->name('capNhatCVHT');
