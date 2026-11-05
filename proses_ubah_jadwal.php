<?php
include 'koneksi.php';

$id = $_POST['id'];
$idSiswa = $_POST['id_siswa'];
$idMataPelajaran = $_POST['id_mata_pelajaran'];
$jadwal = $_POST['jadwal'];

$ubahJadwal = mysqli_query($koneksi, "UPDATE jadwal_kelas SET 
id_siswa = '$idSiswa', id_mata_pelajaran = '$idMataPelajaran', jadwal = '$jadwal' WHERE id = $id");

header('Location: list_jadwal.php');
exit();
