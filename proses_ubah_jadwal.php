<?php
session_start();
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
include 'koneksi.php';

$id = postData('id');
$idSiswa = postData('id_siswa');
$idMataPelajaran = postData('id_mata_pelajaran');
$jadwal = postData('jadwal');
$jadwal = date('Y-m-d H:i:s', strtotime($jadwal));
//var_dump($jadwal);exit();

$validated = true;
// cek kosong
if ($idSiswa == '') {
    $validated = false;
    buatFlash('id_siswa', 'Harap Pilih Siswa');
}

if ($idMataPelajaran == '') {
    $validated = false;
    buatFlash('id_mata_pelajaran', 'Harap Pilih Mata Pelajaran');
}

if ($jadwal == '') {
    $validated = false;
    buatFlash('jadwal', 'Harap Isi Jadwal');
}

if (! validationDate($jadwal, 'Y-m-d H:i:s', date('Y-m-d H:i:s'))) {
    $validated = false;
    buatFlash('jadwal', 'Format Jadwal Salah');
}

// validasi id siswa dan id mapel
$getSiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = $idSiswa");
if (mysqli_num_rows($getSiswa) < 1) {
    $validated = false;
    buatFlash('id_siswa', 'Harap Pilih Siswa');
}
$getMapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE id = $idMataPelajaran");
if (mysqli_num_rows($getMapel) < 1) {
    $validated = false;
    buatFlash('id_mata_pelajaran', 'Harap Pilih Mata Pelajaran');
}

if (! $validated) {
    header('Location: ubah_jadwal.php?id=' . $id);
    exit();
}

$ubahJadwal = mysqli_query($koneksi, "UPDATE jadwal_kelas SET 
id_siswa = '$idSiswa', id_mata_pelajaran = '$idMataPelajaran', jadwal = '$jadwal' WHERE id = $id");

header('Location: list_jadwal.php');
exit();
