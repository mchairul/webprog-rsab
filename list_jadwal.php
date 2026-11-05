<?php

include 'koneksi.php';

$query = "SELECT siswa.nisn, siswa.nama as nama_siswa, mata_pelajaran.kode_mata_pelajaran, mata_pelajaran.nama as nama_mapel, jadwal_kelas.*
FROM jadwal_kelas
JOIN siswa ON jadwal_kelas.id_siswa = siswa.id
JOIN mata_pelajaran ON jadwal_kelas.id_mata_pelajaran = mata_pelajaran.id";

$dataJadwal = mysqli_query($koneksi, $query);
?>

<?php include 'partial/header.php' ?>
<?php include 'partial/nav.php' ?>

<div class="container">
    <h1>Jadwal</h1>
    <a href="tambah_jadwal.php" class="btn btn-primary">Buat Jadwal</a>
    <table class="table">
        <thead>
            <th>Kode Mata Pelajaran</th>
            <th>Mata Pelajaran</th>
            <th>NISN Siswa</th>
            <th>Nama Siswa</th>
            <th>Jadwal</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php while($jadwal = mysqli_fetch_assoc($dataJadwal)) { ?>
            <tr>
                <td><?= $jadwal['kode_mata_pelajaran'] ?></td>
                <td><?= $jadwal['nama_mapel'] ?></td>
                <td><?= $jadwal['nisn'] ?></td>
                <td><?= $jadwal['nama_siswa'] ?></td>
                <td><?= $jadwal['jadwal'] ?></td>
                <td>
                    <a href="ubah_jadwal.php?id=<?= $jadwal['id'] ?>" class="btn btn-warning">Ubah</a>
                    <button class="btn btn-danger" onclick="hapusJadwal('<?= $jadwal['id'] ?>')">Hapus</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function hapusJadwal(id) {
        if (confirm('Apakah anda yakin ?')) {
            window.location.href = 'hapus_jadwal.php?id=' + id
        }
    }
</script>
<?php include 'partial/footer.php' ?>