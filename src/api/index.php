<?php

require_once($_SERVER['DOCUMENT_ROOT']."/api/connection.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/route.php");

require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_admin.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_genre.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_gudang.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_komik.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_member.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_peminjaman.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_penerbit.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_pengarang.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/post_pengembalian.php");

require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_admin.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_genre.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_gudang.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_komik.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_member.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_peminjaman.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_penerbit.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_pengarang.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/handlers/get_all_peminjaman.php");


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");

Route::add('/api/index.php/admin', function() {postAdmin();}, 'post');
Route::add('/api/index.php/genre', function() {postGenre();}, 'post');
Route::add('/api/index.php/gudang', function() {postgudang();}, 'post');
Route::add('/api/index.php/komik', function() {postKomik();}, 'post');
Route::add('/api/index.php/member', function() {postMember();}, 'post');
Route::add('/api/index.php/peminjaman', function() {postPeminjaman();}, 'post');
Route::add('/api/index.php/penerbit', function() {postPenerbit();}, 'post');
Route::add('/api/index.php/pengarang', function() {postPengarang();}, 'post');
Route::add('/api/index.php/pengembalian', function() {postPengembalian();}, 'post');


// Lihat semua Penduduk
Route::add('/api/index.php/admin', function() {getAllAdmin();}, 'get');
Route::add('/api/index.php/genre', function() {getAllGenre();}, 'get');
Route::add('/api/index.php/gudang', function() {getAllGudang();}, 'get');
Route::add('/api/index.php/komik', function() {getAllKomik();}, 'get');
Route::add('/api/index.php/member', function() {getAllMember();}, 'get');
Route::add('/api/index.php/peminjaman', function() {getAllPeminjaman();}, 'get');
Route::add('/api/index.php/penerbit', function() {getAllPenerbit();}, 'get');
Route::add('/api/index.php/pengarang', function() {getAllPengarang();}, 'get');
Route::add('/api/index.php/pengembalian', function() {getAllPengembalian();}, 'get');


Route::add('/api/index.php/(.*)', function() {}, 'options');
Route::run('/');