<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = "SELECT siswa.nisn, siswa.nama as nama_siswa, mata_pelajaran.kode_mata_pelajaran, mata_pelajaran.nama as nama_mapel, jadwal_kelas.*
FROM jadwal_kelas
JOIN siswa ON jadwal_kelas.id_siswa = siswa.id
JOIN mata_pelajaran ON jadwal_kelas.id_mata_pelajaran = mata_pelajaran.id
WHERE jadwal_kelas.id = $id";

$dataJadwal = mysqli_query($koneksi, $query);

$jadwal = mysqli_fetch_assoc($dataJadwal);
//var_dump($jadwal);exit();

$dataSiswa = mysqli_query($koneksi, "SELECT * FROM siswa");
$dataMapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");
?>

<?php include 'partial/header.php'; ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Tambah Jadwal</h1>
    <form action="proses_ubah_jadwal.php" method="POST">
        <input type="hidden" name="id" value="<?= $jadwal['id'] ?>">
        <div class="mb-3">
            <label for="id_siswa">Siswa</label>
            <select name="id_siswa" id="id_siswa" class="form-select" required>
                <option value="">Pilih Siswa</option>
                <?php while ($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
                <option value="<?= $siswa['id'] ?>" <?php if($siswa['id'] == $jadwal['id_siswa']) { echo 'selected'; } ?>><?= $siswa['nama'] ?></option>
                <?php }  ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_mata_pelajaran">Mata Pelajaran</label>
            <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-select" required>
                <option value="">Pilih Mata Pelajaran</option>
                <?php while ($mapel = mysqli_fetch_assoc($dataMapel)) { ?>
                <option value="<?= $mapel['id'] ?>" <?php if($mapel['id'] == $jadwal['id_mata_pelajaran']) { echo 'selected'; } ?>><?= $mapel['nama'] ?></option>
                <?php }  ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jadwal">Jadwal</label>
            <input type="datetime-local" name="jadwal" id="jadwal" class="form-control" value="<?= $jadwal['jadwal'] ?>" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>