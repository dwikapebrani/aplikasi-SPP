<?php
session_start();
 if(!isset($_SESSION['login'])){
    header('location:login.php');
 }

  include 'config/koneksi.php';
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aplikasi Pembayaran SPP</title>

        <!--menghubungkan ke css-->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body>
        <!--identital website-->
        <div class="head">
            <h2 class="head-text">APLIKASI PEMBAYARAN SPP</h2>
            <h2 class="head-text">SMK NEGERI 1 LUBUK PAKAM</h2>
        </div>
        <!--akhir identital website-->

        <!--navigasi-->
        <div class="navbar">
        <div class="logo">
            <h3>E-SPP</h3>
        </div>
        <ul class="link">
            <li><a href="?menu=home">Home</a></li>
            <!--jika login sebagai admin-->
            <?php if ($_SESSION['level']=='admin'){?>
            <li><a href="?menu=siswa">Data siswa</a></li>
            <li><a href="?menu=kelas">Data kelas</a></li>
            <li><a href="?menu=spp">Data SPP</a></li>
            <li><a href="?menu=petugas">Data petugas</a></li>
            <li><a href="?menu=pembayaran">Transaksi</a></li>
            <li><a href="?menu=history-pembayaran">History Pembayaran</a></li>
            <!--jika login sebagai Petugas-->
            <?php } else if($_SESSION['level']=='petugas'){ ?>
            <li><a href="?menu=Pembayaran">Transaksi</a></li>
             <!--jika login sebagai siswa-->
             <?php } else if($_SESSION['level']=='siswa'){ ?>
            <li><a href="?menu=history-pembayaran">History Pembayaran</a></li>
            <?php  }  ?>
            <li><a href="logout.php">Logout</a></li>
        </ul>
       </div>
        <!--akhir navigasi-->

        <!--konten-->
        <div class="container">
            <?php
            error_reporting(0);
            switch($_GET['menu']){
            case 'siswa':
                include 'halaman/siswa.php';
            break;
              //memanggil tambah siswa
              case 'tambah-siswa':
                include 'halaman/tambah-siswa.php';
            break;
            //memanggil hapus siswa
            case 'hapus-siswa':
                include 'halaman/hapus-siswa.php';
            break;
            //memanggil halaman ubah siswa
            case 'ubah-siswa':
                include 'halaman/ubah-siswa.php';
            break;

            case 'kelas':
                include 'halaman/kelas.php';
            break;
            case 'tambah-kelas':
                include 'halaman/tambah-kelas.php';
            break;
            //memanggil hapus kelas
            case 'hapus-kelas':
                include 'halaman/hapus-kelas.php';
            break;
            //memanggil halaman ubah kelas
            case 'ubah-kelas':
                include 'halaman/ubah-kelas.php';
            break;

           //memanggil tambah spp
            case 'tambah-spp':
                include 'halaman/tambah-spp.php';
            break;
            //memanggil hapus spp
            case 'hapus-spp':
                include 'halaman/hapus-spp.php';
            break;
            //memanggil halaman ubah spp
            case 'ubah-spp':
                include 'halaman/ubah-spp.php';
            break;
            case 'spp':
                include 'halaman/spp.php';
            break;

            case 'petugas':
                include 'halaman/petugas.php';
            break;
            //memanggil tambah petugas
            case 'tambah-petugas':
                include 'halaman/tambah-petugas.php';
            break;
            //memanggil hapus petugas
            case 'hapus-petugas':
                include 'halaman/hapus-petugas.php';
            break;
            //memanggil halaman ubah petugas
            case 'ubah-petugas':
                include 'halaman/ubah-petugas.php';
            break;
            case 'pembayaran':
                include 'halaman/pembayaran.php';
            break;
            case 'history-pembayaran':
                include 'halaman/history-pembayaran.php';
            break;

            default:
                include 'halaman/home.php';
            break;
            }
            ?>
            </div>
        <!--akhir konten-->
        <!--footer-->
        <footer>
            &copy <a href="">Dwika Pebriani</a>
        </footer>
        </body>
        </html>
