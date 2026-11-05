<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapusJawdal = mysqli_query($koneksi, "DELETE FROM jadwal_kelas WHERE id = $id");

header('Location: list_jadwal.php');
exit();
