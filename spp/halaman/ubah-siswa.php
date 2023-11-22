<?php
$id = $_GET['id'];
$siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn= '$id'");
$data = mysqli_fetch_array($siswa);
?>

<legend>
    <h5>Form Ubah Siswa</h5>
</legend>

<form action="" method="POST">
    <div class="form-group">
        <label for="">NISN</label>
        <input type="number" name="nisn" class="form-control" required value="<?= $data['nisn'] ?>">
    </div>

    <div class="form-group">
        <label for="">NIS</label>
        <input type="number" name="nis" class="form-control" required value="<?= $data['nis'] ?>">
    </div>

    <div class="form-group">
        <label for="">Nama Siswa</label>
        <input type="text" name="nama" class="form-control" required value="<?= $data['nama'] ?>">
    </div>

    <div class="form-group">
        <label for="">Kelas</label>
        <select name="kelas" id="" required class="form-control">
            <option value="">--Pilih Kelas--</option>
            <?php

            $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
            while($data= mysqli_fetch_array($kelas)){

            ?>
            <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?> || <?= $data['kompetensi_keahlian'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="">Alamat</label>
        <textarea name="alamat" class="form-control" value="<?= $data['alamat']?>"></textarea>
    </div>

    <div class="form-group">
        <label for="">No Telpon</label>
        <input type="number" name="no_telp" class="form-control" required value="<?= $data['no_telp']?>">
    </div>

    <div class="form-group">
        <label for="">SPP</label>
        <select name="spp" id="" required class="form-control">
            <option value="">--Pilih SPP--</option>
            <?php
            $spp = mysqli_query($koneksi, "SELECT * FROM spp");
            while($data= mysqli_fetch_array($spp)){
            ?>
            <option value="<?= $data['id_spp'] ?>"><?= $data['tahun'] ?> || <?= $data['nominal']?></option>
            <?php } ?>
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
    $nisn = htmlspecialchars($_POST['nisn']);
    $nis = htmlspecialchars($_POST['nis']);
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telp = htmlspecialchars($_POST['no_telp']);
    $spp = htmlspecialchars($_POST['id_spp']);

    $ubah = mysqli_query($koneksi, "UPDATE siswa SET nisn ='$nisn', nis ='$nis', nama '$nama'
                                                            kelas ='$kelas, alamat = '$alamat'
                                                            no_telp = '$telp', id_spp ='$spp' WHERE nisn = '$nisn'");
    if($ubah){
        echo"<script>
            alert('Data Berhasil diubah');
        document.location.href='?menu=siswa';
        </script>";
    }else{
        echo"<script>
        alert('Data Gagal diubah');
    
    </script>";
    }
}
