<?php

$id=$_GET['id'];

$hapus = mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas= '$id'");

if($hapus){
    echo"<script>
        alert('Data Berhasil dihapus');
    document.location.href='?menu=kelas';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal dihapus');
</script>";
}

