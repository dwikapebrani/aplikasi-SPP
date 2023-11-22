<div class="col">
    <h3 class="judul"> Daftar Data Siswa</h3>
</div>
<div class="card">
    <div class="card-header">
        <a href="?menu=tambah-siswa" class="btn btn-tambah">Tambah</a>
    </div>

    <div class="card-body">
        <table border="1">
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nis</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>SPP</th>
                <th>Aksi</th>
            </tr>

            <?php

            $no =1;
                $siswa = mysqli_query($koneksi,"SELECT * FROM siswa
                    JOIN kelas ON siswa.id_kelas = kelas.id_kelas 
                    JOIN spp ON siswa.id_spp = spp.id_spp ");
                  
                while($data=mysqli_fetch_array($siswa)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['nisn'] ?></td>
                <td><?php echo $data['nis'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['nama_kelas'] . " | " . 
                                $data['kompetensi_keahlian']; ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['no_telp'] ?></td>
                <td><?php echo $data['tahun'] . " | " . 
                                rupiah($data['nominal']); ?></td>
                <td><a href="?menu=hapus-siswa&id=<?php echo $data['nisn']?>
                "onclick="return confirm ('yakin?');" class="btn btn-hapus" >Hapus</a>

                <a href="?menu=ubah-siswa&id=<?php echo $data['nisn']?>" class="btn btn-edit"> Ubah </a>
                </td>
            </tr>
            <?php } ?>
</table>

</div>
</div>