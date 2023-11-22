<?php

$id=$_GET['id'];

$hapus = mysqli_query($koneksi,"DELETE FROM siswa WHERE nisn= '$id'");

if($hapus){
    echo"<script>
        alert('Data Berhasil dihapus');
    document.location.href='?menu=siswa';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal dihapus');
</script>";
}

