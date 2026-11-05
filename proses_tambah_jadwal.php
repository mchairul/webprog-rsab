<?php

include 'koneksi.php';

$idSiswa = $_POST['id_siswa'];
$idMataPelajaran = $_POST['id_mata_pelajaran'];
$jadwal = $_POST['jadwal'];

$tambahJadwal = mysqli_query($koneksi, "INSERT INTO jadwal_kelas (id_siswa, id_mata_pelajaran, jadwal) VALUES
('$idSiswa', '$idMataPelajaran', '$jadwal') ");

header('Location:list_jadwal.php');
exit();
