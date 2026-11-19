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

$prevoius = $halaman - 1;
$next = $halaman + 1;

// cek halaman awal
if ($halaman > 1) {
    $halamanAwal = ($halaman * $perHalaman) - $perHalaman;
} else {
    $halamanAwal = 0;
}
$keyword = '';
if (isset($_POST['keyword'])) {
    // clean data
    $keyword = postData('keyword');

    $queryTotal = "SELECT COUNT(id) AS jumlah FROM siswa WHERE 
        nisn LIKE '%$keyword%' OR nama LIKE '%$keyword%'";
    $queryData = "SELECT * FROM siswa
        WHERE 
        nisn LIKE '%$keyword%' OR nama LIKE '%$keyword%'
        LIMIT $perHalaman OFFSET $halamanAwal";
} else {
    $queryTotal = "SELECT COUNT(id) AS jumlah FROM siswa";
    $queryData = "SELECT * FROM siswa LIMIT $perHalaman OFFSET $halamanAwal";
}

$getTotalData = pg_query($koneksi, $queryTotal);
$rowTotalData = pg_fetch_assoc($getTotalData);
$totalData = $rowTotalData['jumlah'];

$totalHalaman = ceil($totalData / $perHalaman);

$dataSiswa = pg_query($koneksi, $queryData);
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
        <div class="d-flex justify-content-between align-items-center">
            <h1>Siswa</h1>
            <a href="tambah_siswa.php" class="btn btn-primary">Tambah Siswa</a>
        </div>
        <form action="?" method="post">
            <input type="hidden" name="_token" value="<?= getCsrfToken() ?>">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Data" name="keyword" value="<?php if($keyword != '') { echo $keyword; } ?>">
                <button class="btn btn-outline-secondary" type="submit" id="button-cari">Cari</button>
            </div>

        </form>
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
                <?php while ($siswa = pg_fetch_assoc($dataSiswa)) { ?>
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
                <li class="page-item <?php if($halaman == 1) { echo 'disabled'; } ?>"><a href="?halaman=<?= $prevoius ?>" class="page-link">Previous</a></li>

                <?php for ($i=1; $i <= $totalHalaman; $i++) { ?>
                
                <li class="page-item <?php if($halaman == $i) { echo 'active'; } ?>">
                    <a class="page-link " href="?halaman=<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>

                <?php } ?>
                

                <li class="page-item <?php if($halaman == $totalHalaman) { echo 'disabled'; } ?>"><a class="page-link" href="?halaman=<?= $next ?>">Next</a></li>
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
