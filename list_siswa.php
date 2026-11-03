<?php

include 'koneksi.php';

$dataSiswa = mysqli_query($koneksi, "SELECT * FROM siswa");
?>

<?php include 'partial/header.php' ?>
<?php include 'partial/nav.php' ?>
    <div class="container">
        <h1>Siswa</h1>
        <a href="tambah_siswa.php" class="btn btn-primary">Tambah Siswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
                <tr>
                    <td><?= $siswa['nisn'] ?></td>
                    <td><?= $siswa['nama'] ?></td>
                    <td><?= $siswa['tanggal_lahir'] ?></td>
                    <td><?= $siswa['alamat'] ?></td>
                    <td>
                        <a href="ubah_siswa.php?id=<?= $siswa['id'] ?>" class="btn btn-warning">Ubah</a>
                        <button type="button" class="btn btn-danger" onclick="hapusSiswa('<?= $siswa['id'] ?>')">Hapus</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <script>
        function hapusSiswa(id) {
            if (confirm('Apakah anda yakin ?')) {
                window.location.href = 'hapus_siswa.php?id=' + id;
            }
        }
    </script>
<?php include 'partial/footer.php' ?>
