<?php
include 'koneksi.php';

$id = $_GET['id'];

$dataFile = mysqli_query($koneksi, "SELECT * FROM file_mata_pelajaran WHERE id = $id");

$file = mysqli_fetch_assoc($dataFile);

unlink('uploads/' . $file['nama_file']);

$hapusFile = mysqli_query($koneksi, "DELETE FROM file_mata_pelajaran WHERE id = $id");

header('Location: list_file.php');
exit();
