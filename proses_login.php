<?php
session_start();
include 'koneksi.php';

$username = postData('username');
$password = postData('password');

$validated = true;

// cek apakah username kosong
if ($username == '') {
    // username tidak lolos validation
    $validated = false;
    buatFlash('username', 'harap isi username');
}

if ($password == '') {
    // username tidak lolos validation
    $validated = false;
    buatFlash('password', 'harap isi password');
}

if (! $validated) {
    header('Location: index.php');
    exit();
}

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

buatFlash('username', 'username atau password salah');
header('Location: index.php');
exit();
