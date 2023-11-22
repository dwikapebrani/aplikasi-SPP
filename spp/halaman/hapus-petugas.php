<?php

$id=$_GET['id'];

$hapus = mysqli_query($koneksi,"DELETE FROM petugas WHERE id_petugas= '$id'");

if($hapus){
    echo"<script>
        alert('Data Berhasil dihapus');
    document.location.href='?menu=petugas';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal dihapus');
</script>";
}

