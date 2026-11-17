<?php
include 'koneksi.php';
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}


$dataSiswa = mysqli_query($koneksi, "SELECT * FROM siswa");
$dataMapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");
?>


<?php include 'partial/header.php'; ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Tambah Jadwal</h1>
    <form action="proses_tambah_jadwal.php" method="POST">
        <input type="hidden" name="_token" value="<?= getCsrfToken() ?>">
        <div class="mb-3">
            <label for="id_siswa">Siswa</label>
            <select name="id_siswa" id="id_siswa"
            class="form-select <?php if(cekFlash('id_siswa')) { echo 'is-invalid'; } ?>"
            required>
                <option value="">Pilih Siswa</option>
                <?php while ($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
                <option value="<?= $siswa['id'] ?>"><?= $siswa['nama'] ?></option>
                <?php }  ?>
            </select>
            <div class="invalid-feedback">
                <?php if(cekFlash('id_siswa')) { ?>
                <p><?= showFlash('id_siswa') ?></p>
                <?php } ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="id_mata_pelajaran">Mata Pelajaran</label>
            <select name="id_mata_pelajaran" id="id_mata_pelajaran"
            class="form-select <?php if(cekFlash('id_mata_pelajaran')) { echo 'is-invalid'; } ?>"
            required>
                <option value="">Pilih Mata Pelajaran</option>
                <?php while ($mapel = mysqli_fetch_assoc($dataMapel)) { ?>
                <option value="<?= $mapel['id'] ?>"><?= $mapel['nama'] ?></option>
                <?php }  ?>
            </select>
            <div class="invalid-feedback">
                <?php if(cekFlash('id_mata_pelajaran')) { ?>
                <p><?= showFlash('id_mata_pelajaran') ?></p>
                <?php } ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="jadwal">Jadwal</label>
            <input type="datetime-local" name="jadwal" id="jadwal"
            class="form-control <?php if(cekFlash('jadwal')) { echo 'is-invalid'; } ?>"
            required>
            <div class="invalid-feedback">
                <?php if(cekFlash('jadwal')) { ?>
                <p><?= showFlash('jadwal') ?></p>
                <?php } ?>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>
<script>
    var inputIdSiswa = document.getElementById('id_siswa');
    inputIdSiswa.addEventListener('change', function () {
        inputIdSiswa.classList.remove('is-invalid');
    });

    var inputIdMapel = document.getElementById('id_mata_pelajaran');
    inputIdMapel.addEventListener('change', function () {
        inputIdMapel.classList.remove('is-invalid');
    });

    var inputJadwal = document.getElementById('jadwal');
    inputJadwal.addEventListener('change', function () {
        inputJadwal.classList.remove('is-invalid');
    });
</script>

<?php include 'partial/footer.php'; ?>