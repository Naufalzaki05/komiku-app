<?php
$host   = "localhost";
$dbuser = "postgres";
$dbpass = "waifu";
$port   = "5432";
$dbname = "komiku";

$link = new PDO("pgsql:dbname=$dbname;host=$host",$dbuser,$dbpass);
if($link){
	echo "koneksi berhasil";
}
else{
	echo "Gagal melakukan koneksi";
}
?>