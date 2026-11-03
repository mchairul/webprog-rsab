<?php

$koneksi = mysqli_connect('localhost', 'root', 'root', 'sekolah_abc');

if ($koneksi->connect_error) {
    die('Error konek ke Database : ' . $koneksi->connect_error);
}
