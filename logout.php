<?php
session_start();

//hapus semua session
session_destroy();

header('Location: index.php');
exit();
