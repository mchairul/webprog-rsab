<?php
include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id = $id");
header('Location: list_siswa.php');
exit();
