<?php
$server='localhost';
$user='root';
$pass='';
$db='db_spp';
$koneksi= mysqli_connect($server,$user,$pass,$db);

  if(!$koneksi){
    echo 'koneksi gagal';
  }
 function rupiah ($angka){
  $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
  return $hasil_rupiah;
 }