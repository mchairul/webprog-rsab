<?php
session_start();
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
include 'koneksi.php';

$nisn = postData('nisn');
$nama = postData('nama');
$tanggal_lahir = postData('tanggal_lahir');
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

if ($tanggal_lahir == '') {
    $validated = false;
    buatFlash('tanggal_lahir', 'Harap Isi Tangal Lahir');
}

if ($alamat == '') {
    $validated = false;
    buatFlash('alamat', 'Harap Isi Alamat');
}

// cek nisn
$getNisn = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn'");
// jika nisn sudah ada
if (mysqli_num_rows($getNisn) > 0) {
    $validated = false;
    buatFlash('nisn', 'NISN sudah ada');
}

// cek tanggal
if (! validationDate($tanggal_lahir, 'Y-m-d', '2000-01-01')) {
    $validated = false;
    buatFlash('tanggal_lahir', 'Format Tanggal Lahir salah');
}

if (! $validated) {
    header('Location: tambah_siswa.php');
    exit();
}

$query = "INSERT INTO siswa (nisn, nama, tanggal_lahir, alamat) VALUES ('$nisn', '$nama', '$tanggal_lahir', '$alamat')";

$simpan = mysqli_query($koneksi, $query);
if ($simpan) {
    buatFlash('sukses', 'Berhasil Tambah Siswa');
} else {
    buatFlash('gagal', 'Gagal Tambah Siswa');
}

header('Location: list_siswa.php');
exit();
