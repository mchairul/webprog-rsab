<?php
include 'koneksi.php';
$id = $_GET['id'];

$getSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = $id");

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
            <input type="text" name="nisn" id="nisn" class="form-control" placeholder="input NISN" value="<?= $siswa['nisn'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Input Nama" value="<?= $siswa['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $siswa['tanggal_lahir'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" placeholder="input alamat" required><?= $siswa['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>