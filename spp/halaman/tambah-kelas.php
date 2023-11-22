<legend>
    <h5>Form Tambah Kelas</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">Nama Kelas</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="">Nama Jurusan</label>
        <input type="text" name="jurusan" class="form-control" required>
    </div>

    <button class="btn btn-tambah btn-save" name="simpan">
        Simpan
    </button>

</form>

<?php
//cek apakah tombol simpan sudah di tekan
if(isset($_POST['simpan'])){
    //tampung setiap imputan
    $nama = htmlspecialchars($_POST['nama']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    //maukkan kedalam database
    //koneksi
    //query
    $simpan= mysqli_query($koneksi, "INSERT INTO kelas VALUES ('' , '$nama', '$jurusan') ");

if($simpan){
    echo"<script>
        alert('Data Berhasil disimpan');
    document.location.href='?menu=kelas';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal disimpan');

</script>";
    }
}