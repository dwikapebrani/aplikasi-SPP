<div class="col">
    <h3 class="judul"> Daftar Data Petugas</h3>
</div>
<div class="card">
    <div class="card-header">
        <a href="?menu=tambah-petugas" class="btn btn-tambah">Tambah</a>
    </div>

    <div class="card-body">
        <table border="1">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama Petugas</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no =1;
                $petugas = mysqli_query($koneksi,"SELECT * FROM petugas WHERE level !='siswa'");
                while($data = mysqli_fetch_array($petugas)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['password'] ?></td>
                <td><?php echo $data['nama_petugas'] ?></td>
                <td><?php echo $data['level'] ?></td>
                <td><a href="?menu=hapus-petugas&id=<?php echo $data['id_petugas']?>
                "onclick="return confirm('yakin mau dihapus');" class="btn btn-hapus" >Hapus</a>
                    <a href="?menu=ubah-petugas&id=<?php echo $data['id_petugas']?>" class="btn btn-edit">Ubah </a>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>
</div>
