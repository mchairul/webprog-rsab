<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$getUser = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

// ambil jumlah baris dari hasil query
$jumlahUser = mysqli_num_rows($getUser);

// cek apakah ada
if ($jumlahUser > 0) {
    $user = mysqli_fetch_assoc($getUser);

    //cek password
    if (password_verify($password, $user['password'])) {
        //buat session
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: list_siswa.php');
        exit();
    }
}

header('Location: index.php');
exit();
