<legend>
    <h5>Form Tambah SPP</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">Tahun</label>
        <input type="number" name="tahun" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="">Nominal</label>
        <input type="text" name="nominal" class="form-control" required>
    </div>

    <button class="btn btn-tambah btn-save" name="simpan">
        Simpan
    </button>

</form>

<?php

//cek apakah tombol simpan sudah di tekan
if(isset($_POST['simpan'])){
    //tampung setiap imputan
    $tahun = htmlspecialchars($_POST['tahun']);
    $nominal = htmlspecialchars($_POST['nominal']);

    //maukkan kedalam database
    //koneksi
    //query
    $simpan= mysqli_query($koneksi, "INSERT INTO spp VALUES ('' , '$tahun', '$nominal') ");

if($simpan){
    echo"<script>
        alert('Data Berhasil disimpan');
    document.location.href='?menu=spp';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal disimpan');

</script>";
    }
}