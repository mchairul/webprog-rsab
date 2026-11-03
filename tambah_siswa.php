<?php
include 'koneksi.php';
?>


<?php include 'partial/header.php'; ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Tambah Siswa</h1>
    <form action="proses_simpan_siswa.php" method="POST">
        <div class="mb-3">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" id="nisn" class="form-control" placeholder="input NISN" required>
        </div>
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Input Nama" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Input Alamat" required></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>
