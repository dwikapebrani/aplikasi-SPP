<div class="col">
    <h3 class="judul"> Daftar Nama Kelas</h3>
</div>
<div class="card">
    <div class="card-header">
        <a href="?menu=tambah-kelas" class="btn btn-tambah">Tambah</a>
    </div>

    <div class="card-body">
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no =1;
                $kelas = mysqli_query($koneksi,"SELECT * FROM kelas") ;
                while($data = mysqli_fetch_array($kelas)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['nama_kelas'] ?></td>
                <td><?php echo $data['kompetensi_keahlian'] ?></td>
                <td><a href="?menu=hapus-kelas&id=<?php echo $data['id_kelas']?>
                "onclick="return confirm('yakin mau dihapus');" class="btn btn-hapus" >Hapus</a>
                    <a href="?menu=ubah-kelas&id=<?php echo $data['id_kelas']?>" class="btn btn-edit">Ubah </a>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>
</div>
