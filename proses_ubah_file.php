<?php

include 'koneksi.php';

$id = $_POST['id'];
$idMapel = $_POST['id_mata_pelajaran'];
$keterangan = $_POST['keterangan'];

$file = $_FILES['file_mapel'];

$ubahFile = mysqli_query($koneksi, "UPDATE file_mata_pelajaran 
SET id_mata_pelajaran = '$idMapel', keterangan = '$keterangan'
WHERE id = $id");

// jika ada file yang diupload
if ($file['size'] > 0) {
    $file = $_FILES['file_mapel'];

    $tujuanUpload = 'uploads/';

    $namaFileAsli = $file['name'];
    $tempName = $file['tmp_name'];

    $extension = pathinfo($namaFileAsli, PATHINFO_EXTENSION);
    $namaFileBaru = pathinfo($file['name'], PATHINFO_FILENAME) . '-' . uniqid();
    $fullnameBaru = $namaFileBaru . '.' . $extension;

    $upload = move_uploaded_file($tempName, $tujuanUpload . $fullnameBaru);

    if ($upload) {
        $dataFile = mysqli_query($koneksi, "SELECT * FROM file_mata_pelajaran WHERE id = $id");
        $fileLama = mysqli_fetch_assoc($dataFile);

        $namaFileLama = $fileLama['nama_file'];
        unlink($tujuanUpload . $namaFileLama);

        $tambahFile = mysqli_query($koneksi, "UPDATE file_mata_pelajaran 
        SET nama_file = '$fullnameBaru'
        WHERE id = $id");
    }
}

header('Location: list_file.php');
exit();
