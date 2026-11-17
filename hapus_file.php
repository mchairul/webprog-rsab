<?php
include 'koneksi.php';

if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$dataFile = mysqli_query($koneksi, "SELECT * FROM file_mata_pelajaran WHERE id = $id");

$file = mysqli_fetch_assoc($dataFile);

unlink('uploads/' . $file['nama_file']);

$hapusFile = mysqli_query($koneksi, "DELETE FROM file_mata_pelajaran WHERE id = $id");

header('Location: list_file.php');
exit();
