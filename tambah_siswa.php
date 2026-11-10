<?php
session_start();
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
include 'koneksi.php';
?>


<?php include 'partial/header.php'; ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Tambah Siswa</h1>
    <form action="proses_simpan_siswa.php" method="POST">
        <div class="mb-3">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" id="nisn"
            class="form-control <?php if(cekFlash('nisn')) { echo 'is-invalid'; } ?>" 
            placeholder="input NISN" required>
            <div class="invalid-feedback">
                <?php if(cekFlash('nisn')) {?>
                <p><?= showFlash('nisn') ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama"
            class="form-control <?php if(cekFlash('nama')) { echo 'is-invalid'; } ?>"
            placeholder="Input Nama" required>
            <div class="invalid-feedback">
                <?php if(cekFlash('nama')) {?>
                <p><?= showFlash('nama') ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
            class="form-control <?php if(cekFlash('tanggal_lahir')) { echo 'is-invalid'; } ?>"
            required>
            <div class="invalid-feedback">
                <?php if(cekFlash('tanggal_lahir')) {?>
                <p><?= showFlash('tanggal_lahir') ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat"
            class="form-control <?php if(cekFlash('alamat')) { echo 'is-invalid'; } ?>"
            placeholder="Input Alamat" required></textarea>
            <div class="invalid-feedback">
                <?php if(cekFlash('alamat')) {?>
                <p><?= showFlash('alamat') ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
<script>
    var inputNisn = document.getElementById('nisn');
    inputNisn.addEventListener('input', function(){
        inputNisn.classList.remove('is-invalid');
    })

    var inputNama = document.getElementById('nama');
    inputNama.addEventListener('input', function(){
        inputNama.classList.remove('is-invalid');
    })

    var inputTglLahir = document.getElementById('tanggal_lahir');
    inputTglLahir.addEventListener('change', function(){
        inputTglLahir.classList.remove('is-invalid');
    })

    var inputAlamat = document.getElementById('alamat');
    inputAlamat.addEventListener('input', function(){
        inputAlamat.classList.remove('is-invalid');
    })
</script>

<?php include 'partial/footer.php'; ?>
