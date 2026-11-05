<?php

include 'koneksi.php';

$dataFile = mysqli_query($koneksi, "SELECT mata_pelajaran.kode_mata_pelajaran, mata_pelajaran.nama, file_mata_pelajaran.*
FROM file_mata_pelajaran
JOIN mata_pelajaran ON file_mata_pelajaran.id_mata_pelajaran = mata_pelajaran.id");
?>

<?php include 'partial/header.php' ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>File Mata Pelajaran</h1>
    <a href="tambah_file.php" class="btn btn-primary">+ Tambah File</a>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Mata Pelajaran</th>
                <th>Mata Pelajaran</th>
                <th>File</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($file = mysqli_fetch_assoc($dataFile)) { ?>
            <tr>
                <td><?= $file['kode_mata_pelajaran'] ?></td>
                <td><?= $file['nama'] ?></td>
                <td><?= $file['nama_file'] ?></td>
                <td><?= $file['keterangan'] ?></td>
                <td>
                    <a href="ubah_file.php?id=<?= $file['id'] ?>" class="btn btn-warning">Ubah</a>
                    <button class="btn btn-danger" onclick="deleteFile('<?= $file['id'] ?>')">Hapus</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function deleteFile(id) {
        if (confirm('Apakah anda yakin ?')) {
            window.location.href = 'hapus_file.php?id=' + id
        }
    }
</script>
<?php include 'partial/footer.php' ?>