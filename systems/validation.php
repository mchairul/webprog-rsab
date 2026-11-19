<?php
define('FLASH_PREFIX', 'flash_');

// mengambil nilai post
function postData(string $nama): string
{
    global $koneksi;
    if (! isset($_POST[$nama])) {
        return '';
    }

    // mengembalikan dengan nilai yg sudah ditrim
    return pg_escape_string($koneksi, trim($_POST[$nama]));
}

// mengambil nilai get
function getData(string $nama): string
{
    if (! isset($_GET[$nama])) {
        return '';
    }

    // mengembalikan dengan nilai yg sudah ditrim
    return trim($_GET[$nama]);
}

function buatFlash(string $nama, string $nilai): void
{
    $_SESSION[FLASH_PREFIX . $nama] = $nilai;
}

function cekFlash(string $nama): bool
{
    if (isset($_SESSION[FLASH_PREFIX . $nama])) {
        return true;
    } else {
        return false;
    }
}

function showFlash(string $nama): string
{
    if (isset($_SESSION[FLASH_PREFIX . $nama])) {
        $pesan = $_SESSION[FLASH_PREFIX . $nama];
        unset($_SESSION[FLASH_PREFIX . $nama]);
        return $pesan;
    } else {
        return '';
    }
}

function validationDate(string $date, $format = 'Y-m-d H:i:s', $minDate = '1990-01-01'): bool
{
    $d = DateTime::createFromFormat($format, $date);
    if ($d && $d->format($format) == $date) {
        $tanggal1 = new DateTime($date);
        $tanggal2 = new DateTime($minDate);
        // var_dump($tanggal1);
        // var_dump($tanggal2);
        // exit();
        if ($tanggal1 >= $tanggal2) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}