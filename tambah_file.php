<?php
include 'koneksi.php';

$dataMapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");
?>


<?php include 'partial/header.php'; ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Tambah File</h1>
    <form action="proses_tambah_file.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="id_mata_pelajaran">Mata Pelajaran</label>
            <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-select" required>
                <option value="">-- Pilih Mata Pelajaran --</option>
                <?php while($mapel = mysqli_fetch_assoc($dataMapel)) { ?>
                <option value="<?= $mapel['id'] ?>"><?= $mapel['kode_mata_pelajaran'] ?> - <?= $mapel['nama'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="file_mapel">File</label>
            <input type="file" name="file_mapel" id="file_mapel" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Input Keterangan" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>