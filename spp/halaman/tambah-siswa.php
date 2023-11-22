<legend>
    <h5>Form Tambah Siswa</h5>
</legend>

<form action="" method="POST">
<div class="form-group">
        <label for="">NISN</label>
        <input type="number" name="nisn" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">NIS</label>
        <input type="number" name="nis" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="">Nama Siswa</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="">Kelas</label>
        <select name ="kelas" id="" required class="form-control">
            <option value="">--pilih kelas--</option>
            <?php 

            $kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
            while($data= mysqli_fetch_array($kelas)){

            ?>
            <option value="<?= $data ['id_kelas'] ?>"><?= $data ['nama_kelas'] ?> 
            || <?= $data ['kompetensi_keahlian'] ?></option>
            <?php } ?>

    </select>
    </div>

    <div class="form-group">
        <label for="">Alamat</label>
        <textarea name="alamat" class="form-control" ></textarea>
    </div>

    <div class="form-group">
        <label for="">No Telepon</label>
        <input type="text" name="no_telp" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="">SPP</label>
        <select name ="spp" id="" required class="form-control">
            <option value="">--pilih spp--</option>
            <?php 

            $spp = mysqli_query($koneksi,"SELECT * FROM spp");
            while($data= mysqli_fetch_array($spp)){

            ?>
            <option value="<?= $data ['id_spp'] ?>"><?= $data ['tahun'] ?> 
            || <?= rupiah($data ['nominal']) ?></option>
            <?php } ?>

    </select>
    </div>

    <button class="btn btn-tambah btn-save" name="simpan">
        Simpan
    </button>

</form>

<?php

//cek apakah tombol simpan sudah di tekan
if(isset($_POST['simpan'])){
    //tampung setiap imputan
    $nisn = htmlspecialchars($_POST['nisn']);
    $nis = htmlspecialchars($_POST['nis']);
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telp = htmlspecialchars($_POST['no_telp']);
    $spp = htmlspecialchars($_POST['spp']);

    $petugas = $_SESSION['id_petugas'];

    $bulanindo = array(
        '01' => 'januari',
        '02' => 'februari',  
        '03' => 'maret', 
        '04' => 'april', 
        '05' => 'mei', 
        '06' => 'juni', 
        '07' => 'juli', 
        '08' => 'agustus', 
        '09' => 'september', 
        '10' => 'oktober', 
        '11' => 'november', 
        '12' => 'desember', 
    );

    $tahun = 13 - date ('m');

    $cek_nis = mysqli_query($koneksi, 
    "SELECT * FROM siswa WHERE nisn='$nisn' OR nis = '$nis' ");

    if(mysqli_num_rows($cek_nis) > 0){
        echo'
        <script>
            alert("nisn / nis sudah terdaftar");
            </script>
        ';
    }else{
        /**
         * simpan kedatabase
         * 1. simpan kedalam tabel siswa
         * 2. simpan kedalam tabel petugas
         * 3. kedalam tabel pembayaran untuk membuat kartu tagihan
         */

         //simpan ketabel siswa

    $simpan_siswa = mysqli_query($koneksi,
        "INSERT INTO siswa VALUES
        ('$nisn','$nis','$nama','$kelas','$alamat','$no_telp','$spp')");
    
        //simpan kedalam tabel petugas
    $simpan_petugas = mysqli_query($koneksi, 
        "INSERT INTO petugas VALUES('','$nisn','$nis','$nama','siswa')");
   
        //simpan kedalam tabel pembayaran 
    for($i=0; $i<$tahun;$i++){
        $jatuhtempo = date ("y-m-d",strtotime("+$i month"));
        $bulan = $bulanindo[date("m", strtotime($jatuhtempo))];
        $tahun_bayar = date("y",strtotime($jatuhtempo));

        //masukkan kedalam tabel pembayaran
        mysqli_query($koneksi,
        "INSERT INTO pembayaran VALUES 
        ('','$petugas','$nisn','0000-00-00','$bulan','$tahun_bayar','$spp','','belumbayar')");
    }

    if($simpan_petugas && $simpan_siswa ){
    echo"<script>
        alert('Data Berhasil disimpan');
        document.location.href='?menu=siswa';
    </script>";
}else{
    echo"<script>
    alert('Data Gagal disimpan');

</script>";
    }
   
    }

}
?>