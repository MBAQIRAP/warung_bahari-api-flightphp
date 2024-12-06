<?php
require 'vendor/autoload.php';
require 'login.php';
require 'database.php';
require 'kategori_produk.php';
require 'user_role.php';
require 'kategori_pemasukan.php';
require 'kategori_pengeluaran.php';
require 'produk.php'; #belum dicoba
require 'kas.php'; #belum dicoba
require 'user.php'; #belum dicoba
require 'pemasukan.php'; #belum dicoba
require 'pengeluaran.php'; #belum dicoba
require 'pemasukan_detail.php'; #belum coba



Flight::route('/', function(){
    echo 'nice';
});

#route masuk login
Flight::route('POST /login', ['Login','login']);

#route crud kategori_produk
Flight::route('GET /kategori_produk', ['Kategori_produk','get_kategori_produk']);
Flight::route('POST /kategori_produk', ['Kategori_produk','insert_kategori_produk']);
Flight::route('PUT /kategori_produk', ['Kategori_produk','update_kategori_produk']);
Flight::route('DELETE /kategori_produk', ['Kategori_produk','delete_kategori_produk']);

#route crud user_role
Flight::route('GET /user_role', ['User_role','get_user_role']);
Flight::route('POST /user_role', ['User_role','insert_user_role']);
Flight::route('PUT /user_role', ['User_role','update_user_role']);
Flight::route('DELETE /user_role', ['User_role','delete_user_role']);

#route crud kategori_pemasukan
Flight::route('GET /kategori_pemasukan', ['Kategori_pemasukan','get_kategori_pemasukan']);
Flight::route('POST /kategori_pemasukan', ['Kategori_pemasukan','insert_kategori_pemasukan']);
Flight::route('DELETE /kategori_pemasukan', ['Kategori_pemasukan','delete_kategori_pemasukan']);
Flight::route('PUT /kategori_pemasukan', ['Kategori_pemasukan','update_kategori_pemasukan']);

#route read kategori_pengeluaran
Flight::route('GET /kategori_pengeluaran', ['Kategori_pengeluaran','get_kategori_pengeluaran']);
Flight::route('POST /kategori_pengeluaran', ['Kategori_pengeluaran','insert_kategori_pengeluaran']);
Flight::route('PUT /kategori_pengeluaran', ['Kategori_pengeluaran','update_kategori_pengeluaran']);
Flight::route('DELETE /kategori_pengeluaran', ['Kategori_pengeluaran','delete_kategori_pengeluaran']);

#route crud produk
Flight::route('GET /produk', ['Produk','get_produk']);
Flight::route('POST /produk', ['Produk','insert_produk']);
Flight::route('PUT /produk', ['Produk','update_produk']);
Flight::route('DELETE /produk', ['Produk','delete_produk']);

#route crud kas
Flight::route('GET /kas', ['Kas','get_kas']);
Flight::route('POST /kas', ['Kas','insert_kas']);
Flight::route('PUT /kas', ['Kas','update_kas']);
Flight::route('DELETE /kas', ['Kas','delete_kas']);

#route crud user
Flight::route('GET /user', ['User','get_user']);
Flight::route('POST /user', ['User','insert_user']);
Flight::route('PUT /user', ['User','update_user']);
Flight::route('DELETE /user', ['User','delete_user']);

#route crud pemasukan
Flight::route('GET /pemasukan', ['Pemasukan','get_pemasukan']);
Flight::route('POST /pemasukan', ['Pemasukan','insert_pemasukan']);
Flight::route('PUT /pemasukan', ['Pemasukan','update_pemasukan']);
Flight::route('DELETE /pemasukan', ['Pemasukan','delete_pemasukan']);

#route crud pengeluaran
Flight::route('GET /pengeluaran', ['Pengeluaran','get_pengeluaran']);
Flight::route('POST /pengeluaran', ['Pengeluaran','insert_pengeluaran']);
Flight::route('PUT /pengeluaran', ['Pengeluaran','update_pengeluaran']);
Flight::route('DELETE /pengeluaran', ['Pengeluaran','delete_pengeluaran']);

#route crud pemasukan_detail
Flight::route('GET /pemasukan_detail', ['Pemasukan_detail','get_pemasukan_detail']);
Flight::route('POST /pemasukan_detail', ['Pemasukan_detail','insert_pemasukan_detail']);
Flight::route('PUT /pemasukan_detail', ['Pemasukan_detail','update_pemasukan_detail']);
Flight::route('DELETE /pemasukan_detail', ['Pemasukan_detail','delete_pemasukan_detail']);

// Finally, start the framework.
Flight::start();