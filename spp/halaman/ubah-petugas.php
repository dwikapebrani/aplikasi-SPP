<?php
$id = $_GET['id'];
$petugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas= '$id'");
$data = mysqli_fetch_array($petugas);
?>

<legend>
    <h5>Form Ubah Petugas</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" required value="<?= $data['username']?>">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="text" name="password" class="form-control" required value="<?= $data['password']?>">
    </div>

    <div class="form-group">
        <label for="">Nama Petugas</label>
        <input type="text" name="nama_petugas" class="form-control" required value="<?= $data['nama_petugas']?>">
    </div>

    <div class="form-group">
        <label for="">Level</label>
        <select name="level" id=""class="form-control" required value="<?= $data['level']?>">
            <option value="">--Pilih Level--</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="siswa">Petugas</option>
        </select>
    </div>

    <button class="btn btn-tambah btn-save" name="ubah">
        Simpan
    </button>

</form>

<?php
//cek apakah tombol simpan sudah di tekan
if(isset($_POST['ubah'])){
    //tampung setiap imputan
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $nama = htmlspecialchars($_POST['nama_petugas']);
    $level = htmlspecialchars($_POST['level']);

    //maukkan kedalam database
    //koneksi
    //query
    $ubah= mysqli_query($koneksi, "UPDATE petugas SET username = '$username', password = '$password',  nama_petugas ='$nama', level = '$level'  WHERE id_petugas = '$id'");

if($ubah){
    echo"<script>
        alert('Data Berhasil diubah');
    document.location.href='?menu=petugas';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal diubah');

</script>";
    }
}