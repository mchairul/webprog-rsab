<?php
// konfigurasi session
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

session_regenerate_id(true);

$koneksi = mysqli_connect('localhost', 'root', 'root', 'sekolah_abc');

if ($koneksi->connect_error) {
    die('Error konek ke Database : ' . $koneksi->connect_error);
}

include 'systems/loader.php';
