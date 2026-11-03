<?php
include 'koneksi.php';

$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO siswa (nisn, nama, tanggal_lahir, alamat) VALUES ('$nisn', '$nama', '$tanggal_lahir', '$alamat')";

$simpan = mysqli_query($koneksi, $query);

header('Location: list_siswa.php');
exit();
