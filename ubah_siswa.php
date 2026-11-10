<?php
session_start();
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

include 'koneksi.php';

$id = getData('id');
if ($id == '') {
    header('Location: list_siswa.php');
    exit();
}

$getSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = $id");

if (mysqli_num_rows($getSiswa) < 1) {
    header('Location: list_siswa.php');
    exit();
}

$siswa = mysqli_fetch_assoc($getSiswa);
?>

<?php include 'partial/header.php'; ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Ubah Siswa</h1>
    <form action="proses_ubah_siswa.php" method="post">
        <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
        <div class="mb-3">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" id="nisn"
            class="form-control <?php if (cekFlash('nisn')) { echo 'is-invalid'; } ?>"
            placeholder="input NISN" value="<?= $siswa['nisn'] ?>" required>
            <div class="invalid-feedback">
                <?php if (cekFlash('nisn')) { ?>
                <p><?= showFlash('nisn') ?></p>
                <?php  } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama"
            class="form-control <?php if (cekFlash('nama')) { echo 'is-invalid'; } ?>"
            placeholder="Input Nama" value="<?= $siswa['nama'] ?>" required>
            <div class="invalid-feedback">
                <?php if (cekFlash('nama')) { ?>
                <p><?= showFlash('nama') ?></p>
                <?php  } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
            class="form-control <?php if (cekFlash('tanggal_lahir')) { echo 'is-invalid'; } ?>" 
            value="<?= $siswa['tanggal_lahir'] ?>" required>
            <div class="invalid-feedback">
                <?php if (cekFlash('tanggal_lahir')) { ?>
                <p><?= showFlash('tanggal_lahir') ?></p>
                <?php  } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat"
            class="form-control <?php if (cekFlash('alamat')) { echo 'is-invalid'; } ?>"
            placeholder="input alamat" required><?= $siswa['alamat'] ?></textarea>
            <div class="invalid-feedback">
                <?php if (cekFlash('alamat')) { ?>
                <p><?= showFlash('alamat') ?></p>
                <?php  } ?>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Ubah</button>
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