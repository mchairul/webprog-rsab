<?php
include 'koneksi.php';
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$perHalaman = 5;
// cek halaman
if (isset($_GET['halaman'])) {
    $halaman = (int) $_GET['halaman'];
} else {
    $halaman = 1;
}
// cek halaman awal
if ($halaman > 1) {
    $halamanAwal = ($halaman * $perHalaman) - $perHalaman;
} else {
    $halamanAwal = 0;
}

$dataSiswa = mysqli_query($koneksi, "SELECT * FROM siswa LIMIT $halamanAwal, $perHalaman");
?>

<?php include 'partial/header.php' ?>
<?php include 'partial/nav.php' ?>
    <div class="container">
        <?php if (cekFlash('sukses')) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <div><?= showFlash('sukses') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
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
                    <td><?= xssClean($siswa['nisn']) ?></td>
                    <td><?= xssClean($siswa['nama']) ?></td>
                    <td><?= xssClean($siswa['tanggal_lahir']) ?></td>
                    <td><?= xssClean($siswa['alamat']) ?></td>
                    <td>
                        <a href="ubah_siswa.php?id=<?= $siswa['id'] ?>" class="btn btn-warning">Ubah</a>
                        <button type="button" class="btn btn-danger" onclick="hapusSiswa('<?= $siswa['id'] ?>')">Hapus</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item"><a href="#" class="page-link">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <a class="page-link" href="#" aria-current="page">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
    </div>
    
    <script>
        function hapusSiswa(id) {
            if (confirm('Apakah anda yakin ?')) {
                window.location.href = 'hapus_siswa.php?id=' + id;
            }
        }
    </script>
<?php include 'partial/footer.php' ?>
