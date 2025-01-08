<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPT SDN 02 KP LALANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            overflow: hidden;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            object-fit: cover;
            object-position: center;
        }

        .quote {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .glass {
            background: rgba(225, 225, 225, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.30);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        @media screen and (max-width: 768px) {
            .glass {
                font-size: 10px;
            }

            .glass h1 {
                font-size: 16px;
            }

            .glass div button {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <img src="img/sekolah-sd.jpeg" alt="Abstract cosmic background with swirling patterns and stars" class="background-image">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid" class="d-flex">
            <a class="navbar-brand" href="#" class="">
                <img src="img/logo.png" alt="" width="50">
            </a>
        </div>
    </nav>
    <div class="quote">
        <div class="glass text-black p-3 rounded-3">
            <h1>Selamat Datang Di Website <br>
                UPT SDN 02 KP LALANG
            </h1>
            <p>Nama Sekolah:Upt SD Negeri 02 Kp Lalang
                Status:Negeri
                Alamat:Jl.rahmadsyah No.15
                Desa/Kelurahan : Suka Maju
                Kecamatan: Tanjung Tiram
                Kabupaten:Batu Bara
            </p>
            <div class="mt-3">
                <a href="login.php">
                    <button class="btn btn-primary">Login Sekarang</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>