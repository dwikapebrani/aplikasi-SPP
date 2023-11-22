<div class="col">
    <h3 class="judul"> Daftar SPP</h3>
</div>
<div class="card">
    <div class="card-header">
        <a href="?menu=tambah-spp" class="btn btn-tambah">Tambah</a>
    </div>

    <div class="card-body">
        <table border="1">
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no =1;
                $kelas = mysqli_query($koneksi,"SELECT * FROM spp") ;
                while($data = mysqli_fetch_array($kelas)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tahun'] ?></td>
                <td><?php echo rupiah($data['nominal']) ?></td>
                <td><a href="?menu=hapus-spp&id=<?php echo $data['id_spp']?>
                "onclick="return confirm('yakin mau dihapus');" class="btn btn-hapus" >Hapus</a>
                    <a href="?menu=ubah-spp&id=<?php echo $data['id_spp']?>" class="btn btn-edit" >Ubah</a>
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>
</div>
