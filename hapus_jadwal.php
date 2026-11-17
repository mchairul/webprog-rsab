<?php
include 'koneksi.php';
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}


$id = $_GET['id'];

$hapusJawdal = mysqli_query($koneksi, "DELETE FROM jadwal_kelas WHERE id = $id");

header('Location: list_jadwal.php');
exit();
