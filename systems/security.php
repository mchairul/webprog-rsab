<?php

//random string
function buatRandomString(int $panjang): string
{
    $karakter = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $panjang; $i++) {
        $posisi = random_int(0, strlen($karakter) - 1);
        $randomString .= $karakter[$posisi];
    }

    return $randomString;
}

// membuat CSRF Token
function buatCsrfToken(): void
{
    if (! isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = buatRandomString(64);
    }
}

buatCsrfToken();

function getCsrfToken(): string
{
    return $_SESSION['csrf_token'];
}

// jika request method = post, cek csrf nya
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // cek jika tidak ada
    if (! isset($_POST['_token'])) {
        header('Location: forbidden.php');
        exit();
    }
    // cek jika token tidak sama
    if (postData('_token') != $_SESSION['csrf_token']) {
        header('Location: forbidden.php');
        exit();
    }
}

function xssClean(string $data): string
{
    $clean = htmlspecialchars($data);
    
    return $clean;
}


// session activity
if (isset($_SESSION['aktivitas_terakhir']) && (time() - $_SESSION['aktivitas_terakhir'] > 1800)) {
    session_unset();
    session_destroy();
}
$_SESSION['aktivitas_terakhir'] = time();

// cek user agent
if (! isset($_SESSION['user_agent'])) {
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
} else {
    if ($_SESSION['user_agent'] != $_SERVER['HTTP_USER_AGENT']) {
        session_unset();
        session_destroy();
    }
}
