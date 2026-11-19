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

try {
    $koneksi = pg_connect('host=localhost port=5432 dbname=sekolah user=postgres password=root');
} catch (Exception $e) {
    die('koneksi error: ' . $e->getMessage());
}


include 'systems/loader.php';
