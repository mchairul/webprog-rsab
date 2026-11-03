<?php
include 'koneksi.php';

$id = $_POST['id'];
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$tanggalLahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];

$query = "UPDATE siswa SET nisn = '$nisn', nama = '$nama', tanggal_lahir = '$tanggalLahir', alamat = '$alamat' WHERE id = $id ";
$ubah = mysqli_query($koneksi, $query);

header('Location: list_siswa.php');
exit();
