<div class="col">
    <h3 class="judul"> Data Transaksi</h3>
</div>
<div class="card">
    <div class="card-header">
        <a href="?menu=tambah-pembayaran" class="btn btn-tambah">Tambah</a>
    </div>

    <div class="card-body">
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Nama Siswa</th>
                <th>Tgl|Bln|Tahun</th>
                <th>Tahun|Nominal Bayar</th>
                <th>Jumlah Yang Dibayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php

            $no =1;
                $pembayaran = mysqli_query($koneksi,"SELECT * FROM pembayaran
                    JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
                    JOIN siswa ON pembayaran.nisn = siswa.nisn 
                    JOIN spp ON pembayaran.id_spp = spp.id_spp ");

                  
                while($data=mysqli_fetch_array($pembayaran)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['nama_petugas']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['tgl_bayar']; ?></td>
                <td><?php echo $data['tahun'] . " | " . 
                        rupiah($data['nominal']); ?></td>
                <td><?php echo rupiah($data['jumlah_bayar']); ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><a href="?menu=hapus-pembayaran&id=<?php echo $data['nisn']?>
                "onclick="return confirm ('yakin?');" class="btn btn-hapus" >Hapus</a>

                <a href="?menu=ubah-pembayaran&id=<?php echo $data['nisn']?>" class="btn btn-edit"> Ubah </a>
                </td>
            </tr>


<?php } ?>
</table>

</div>
</div>