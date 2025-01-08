<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: dashboard.php");
}
require 'koneksi.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($email == "admin@gmail.com" || $password == "admin") {
        $_SESSION["login"] = true;
        $_SESSION['NIDN'] = 1;
        $_SESSION['EMAIL'] = $email;
        $_SESSION['NAME'] = "admin";
        $_SESSION['FOTO'] = "admin.jpg";
        header("Location: dashboard.php");
        exit;
    } 
    $result = mysqli_query($koneksi, "SELECT * FROM guru WHERE EMAIL ='$email'");

    if (mysqli_num_rows($result) === 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["PASSWORD"])) {
                $_SESSION["login"] = true;
                $_SESSION['NIDN'] = $row["NIDN"];
                $_SESSION['EMAIL'] = $email;
                $_SESSION['NAME'] = $row["NAME"];
                $_SESSION['FOTO'] = $row["FOTO"];
                header("Location: dashboard.php");
                exit;
            }
        }
    }
    $error = true;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | UPT SDN 02 KP LALANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: white;
            text-align: center;
            background-color: rgba(205, 212, 162, 0.65);
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-box {
            background: rgba(118, 172, 49, 0.33);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            border: 1px solid rgba(165, 162, 162, 0.2);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }


        .btn-custom {
            background-color: rgba(107, 148, 10, 0.47);
            border: none;
            color: white;
            width: 100%;
            padding: 10px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="" method="post">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger mr-5 ml-5 radius" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <div class="mb-3 position-relative">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-custom" name="login">SIGN IN</button>
                <div class="form-group mt-4 ml-5 mr-5">
                    <span>Belum punya akun?</span>
                    <a href="registrasi.php">
                        Registrasi
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>