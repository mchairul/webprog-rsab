<?php

include 'koneksi.php';

$query = "SELECT siswa.nama as nama_siswa, mata_pelajaran.nama as nama_mapel, jadwal_kelas.* FROM jadwal_kelas 
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
            <th>Mata Pelajaran</th>
            <th>Siswa</th>
            <th>Jadwal</th>
        </thead>
        <tbody>
            <?php while($jadwal = mysqli_fetch_assoc($dataJadwal)) { ?>
            <tr>
                <td><?= $jadwal['nama_mapel'] ?></td>
                <td><?= $jadwal['nama_siswa'] ?></td>
                <td><?= $jadwal['jadwal'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'partial/footer.php' ?>