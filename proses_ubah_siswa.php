<?php
include 'koneksi.php';
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$id = postData('id');
$nisn = postData('nisn');
$nama = postData('nama');
$tanggalLahir = postData('tanggal_lahir');
$alamat = postData('alamat');

$validated = true;

// jika nisn kosong
if ($nisn == '') {
    $validated = false;
    buatFlash('nisn', 'Harap Isi NISN');
}

if ($nama == '') {
    $validated = false;
    buatFlash('nama', 'Harap Isi Nama');
}

if ($tanggalLahir == '') {
    $validated = false;
    buatFlash('tanggal_lahir', 'Harap Isi Tangal Lahir');
}

if ($alamat == '') {
    $validated = false;
    buatFlash('alamat', 'Harap Isi Alamat');
}

// cek nisn
$getNisn = pg_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn' AND id != $id");
// jika nisn sudah ada
if (pg_num_rows($getNisn) > 0) {
    $validated = false;
    buatFlash('nisn', 'NISN sudah ada');
}

// cek tanggal
if (! validationDate($tanggalLahir, 'Y-m-d', '2000-01-01')) {
    $validated = false;
    buatFlash('tanggal_lahir', 'Format Tanggal Lahir salah');
}

if (! $validated) {
    header('Location: ubah_siswa.php?id=' . $id);
    exit();
}

$query = "UPDATE siswa SET nisn = '$nisn', nama = '$nama', tanggal_lahir = '$tanggalLahir', alamat = '$alamat' WHERE id = $id ";
$ubah = pg_query($koneksi, $query);

header('Location: list_siswa.php');
exit();
