<?php

include 'koneksi.php';

$idMapel = $_POST['id_mata_pelajaran'];
$keterangan = $_POST['keterangan'];

$file = $_FILES['file_mapel'];

$tujuanUpload = 'uploads/';

$namaFileAsli = $file['name'];
$tempName = $file['tmp_name'];

$extension = pathinfo($namaFileAsli, PATHINFO_EXTENSION);
$namaFileBaru = pathinfo($file['name'], PATHINFO_FILENAME) . '-' . uniqid();
$fullnameBaru = $namaFileBaru . '.' . $extension;

$upload = move_uploaded_file($tempName, $tujuanUpload . $fullnameBaru);

if ($upload) {
    $tambahFile = mysqli_query($koneksi, "INSERT INTO file_mata_pelajaran 
    (id_mata_pelajaran, nama_file, keterangan) VALUES
    ('$idMapel', '$fullnameBaru', '$keterangan')");
}

header('Location:list_file.php');
