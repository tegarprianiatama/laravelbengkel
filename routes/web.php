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

Route::resource('dataBarangs', 'DataBarangController');

Route::get('data-barang/{id}', 'DataBarangController@find');

Route::get('data-jasa_servis/{id}', 'DataJasaServisController@find');

Route::resource('dataJasaServis', 'DataJasaServisController');

Route::resource('dataKasirs', 'DataKasirController');

Route::resource('dataMekaniks', 'DataMekanikController');

Route::resource('roles', 'RoleController');

// Route::resource('dataMotorPelanggans', 'DataMotorPelangganController');
Route::prefix('dataMotorPelanggans')->group(function() {
	Route::name('dataMotorPelanggans.')->group(function() {
		Route::get('{id}', 'DataMotorPelangganController@index')->name('index');
		Route::get('create/{id}', 'DataMotorPelangganController@create')->name('create');
		Route::post('create', 'DataMotorPelangganController@store')->name('store');
		Route::get('show/{id}', 'DataMotorPelangganController@show')->name('show');
		Route::get('edit/{pelangganId}/{id}', 'DataMotorPelangganController@edit')->name('edit');
		Route::patch('{id}', 'DataMotorPelangganController@update')->name('update');
		Route::delete('{pelangganId}/{id}', 'DataMotorPelangganController@destroy')->name('destroy');
	});	
});

Route::resource('dataPelanggans', 'DataPelangganController');

Route::resource('dataSuppliers', 'DataSupplierController');

Route::resource('dataTransaksis', 'DataTransaksiController');

Route::resource('detailTransaksis', 'DetailTransaksiController');

Route::resource('dataPembelianBarangs', 'DataPembelianBarangController');

Route::resource('dataPenjualanBarangs', 'DataPenjualanBarangController');

Route::resource('detailPembelianBarangs', 'DetailPembelianBarangController');

Route::resource('detailPenjualanBarangs', 'Detail_Penjualan_BarangController');

Route::get('/', 'HomeController@index');

Route::get('/data-barang', 'DataBarangController@dataBarang');

Route::get('dataPenjualanBarangs/print/{id}', 'DataPenjualanBarangController@print')->name('dataPenjualanBarangs.print');

Route::get('dataTransaksis/print/{id}', 'DataTransaksiController@print')->name('dataTransaksis.print');

Route::get('dataPembelianBarangs/print/{id}', 'DataPembelianBarangController@print')->name('dataPembelianBarangs.print');

// Route::get('dataPenjualanBarangs/printnota/{id}', 'DataPenjualanBarangController@printnota')->name('dataPenjualanBarangs.printnota');

Route::resource('laporanPenjualanBarangs', 'LaporanPenjualanBarangController');

Route::get('/LaporanPenjualanBarang', 'LaporanPenjualanBarangController@index')->name('laporan_penjualan_barangs.index');

Route::resource('laporanPembelianBarangs', 'LaporanPembelianBarangController');

Route::get('/LaporanPembelianBarang', 'LaporanPembelianBarangController@index')->name('laporan_pembelian_barangs.index');

Route::resource('laporanJasaServis', 'LaporanJasaServisController');

Route::get('/LaporanJasaServis', 'LaporanJasaServisController@index')->name('laporan_jasa_servis.index');

Route::get('/LaporanPenjualanBarang/print/{id}', 'LaporanPenjualanBarangController@print')->name('laporan.pdf');

Route::resource('kategoriMotors', 'KategoriMotorController');

Route::get('/get-barang', 'DataPenjualanBarangController@barangajax' )->name('get-barang');