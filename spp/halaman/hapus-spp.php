<?php

$id=$_GET['id'];

$hapus = mysqli_query($koneksi,"DELETE FROM spp WHERE id_spp= '$id'");

if($hapus){
    echo"<script>
        alert('Data Berhasil dihapus');
    document.location.href='?menu=spp';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal dihapus');
</script>";
}

