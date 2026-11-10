<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <style>
        .login-form {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-form mt-5 p-5">
                <h1>Login</h1>
                <form action="proses_login.php" method="post">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control <?php if(cekFlash('username')) { echo 'is-invalid'; } ?>"
                            placeholder="Input Username" required>
                        <div class="invalid-feedback">
                            <?php if(cekFlash('username')) { ?>
                            <p><?= showFlash('username') ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control <?php if(cekFlash('password')) { echo 'is-invalid'; } ?>"
                            placeholder="Input password" required>
                        <div class="invalid-feedback">
                            <?php if(cekFlash('password')) { ?>
                            <p><?= showFlash('password') ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var inputUsername = document.getElementById('username');
        inputUsername.addEventListener('input', function(){
            inputUsername.classList.remove('is-invalid');
        })

        var inputPassword = document.getElementById('password');
        inputPassword.addEventListener('input', function(){
            inputPassword.classList.remove('is-invalid');
        })

    </script>
</body>
</html>