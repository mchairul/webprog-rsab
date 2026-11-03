<?php
include 'koneksi.php';

$dataSiswa = mysqli_query($koneksi, "SELECT * FROM siswa");
$dataMapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");
?>


<?php include 'partial/header.php'; ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Tambah Jadwal</h1>
    <form action="">
        <div class="mb-3">
            <label for="id_siswa">Siswa</label>
            <select name="id_siswa" id="id_siswa" class="form-select" required>
                <option value="">Pilih Siswa</option>
                <?php while ($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
                <option value="<?= $siswa['id'] ?>"><?= $siswa['nama'] ?></option>
                <?php }  ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_mata_pelajaran">Mata Pelajaran</label>
            <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-select" required>
                <option value="">Pilih Mata Pelajaran</option>
                <?php while ($mapel = mysqli_fetch_assoc($dataMapel)) { ?>
                <option value="<?= $mapel['id'] ?>"><?= $mapel['nama'] ?></option>
                <?php }  ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jadwal">Jadwal</label>
            <input type="datetime-local" name="jadwal" id="jadwal" class="form-control" required>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>