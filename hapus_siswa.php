<?php
include 'koneksi.php';
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}


$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id = $id");
header('Location: list_siswa.php');
exit();
