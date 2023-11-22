<?php
$id = $_GET['id'];
$kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas= '$id'");
$data = mysqli_fetch_array($kelas);
?>

<legend>
    <h5>Form Ubah Kelas</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">Nama Kelas</label>
        <input type="text" name="nama" class="form-control" required value="<?= $data['nama_kelas']?>">
    </div>

    <div class="form-group">
        <label for="">Nama Jurusan</label>
        <input type="text" name="jurusan" class="form-control" required value="<?= $data['kompetensi_keahlian']?>">
    </div>

    <button class="btn btn-tambah btn-save" name="ubah">
        Simpan
    </button>

</form>

<?php
//cek apakah tombol simpan sudah di tekan
if(isset($_POST['ubah'])){
    //tampung setiap imputan
    $nama = htmlspecialchars($_POST['nama']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    //maukkan kedalam database
    //koneksi
    //query
    $ubah= mysqli_query($koneksi, "UPDATE kelas SET nama_kelas ='$nama', kompetensi_keahlian = '$jurusan' WHERE id_kelas = '$id'");

if($ubah){
    echo"<script>
        alert('Data Berhasil diubah');
    document.location.href='?menu=kelas';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal diubah');

</script>";
    }
}