<?php
require("functions/functions.php");
session_start();
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT roles FROM users WHERE id ='$id'"));
    $roles = $result["roles"];
} else {
    $roles = "GUEST";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Paket</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="Libraries/xzoom/dist/xzoom.css">
    <!-- main style -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <a class="navbar-brand col-4" href="index.php">
                <img src="img/logo.svg" width="152px" height="70px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cari.php">Paket Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
            <?php if ($id = "") : ?>
            <div class="button">
                <button type="button" class="btn btn-outline-primary"
                    style="width: 116px; height: 43px; margin: 0 10px;">Login</a></button>
                <button type="button" class="btn btn-primary" style="width: 116px; height: 43px;">Register</a></button>
            </div>
            <?php endif; ?>
            <?php if ($roles == "USER") : ?>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="width: 126px; height: 43px; margin: 0 10px;">
                    Akun Saya
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="myAccount.php">Edit Akun</a>
                    <a class="dropdown-item" href="#">Transaksi Saya</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($roles == "GUEST") : ?>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-lg"
                    style="width: 126px; height: 43px; margin: 0 10px;"><a href="login_register.php"
                        style="color: white; text-decoration: none;">
                        Login</a>
                </button>
            </div>
            <?php endif; ?>
        </nav>
    </div>

    <main>
        <section class="section-details">
            <div class="container">
                <h5>Home / <span style="font-weight: bold;">Detail Paket</span></h5>
                <div class="row">
                    <div class="card card-detail col col-7" style="margin-bottom: 20px;">
                        <h3>Jalan - Jalan Ke Jogja</h3>
                        <div class="gallery">
                            <div class="xzoom-container" style="margin-left: 30px; margin-top: 20px;">
                                <?php $id = $_GET["id"];
                                $data = query("SELECT * FROM paket_travel as p LEFT JOIN gallery as g ON g.paket_travel_id = p.id WHERE p.id = $id LIMIT 1") ?>
                                <?php foreach ($data as $data) : ?>
                                <img src="Admin/img/paket/<?= $data["image"] ?>" alt="Details" width="510px"
                                    height="300px" class="x-zoom" id="xzoom-main"
                                    x-original="Admin/img/paket/<?= $data["image"] ?>">
                                <?php endforeach; ?>
                            </div>
                            <div class="xzoom-thumbs d-flex justify-content-center"
                                style="margin-top: 10px; flex-wrap: wrap; margin-left: -55px;">
                                <?php $id = $_GET["id"];
                                $data = query("SELECT * FROM paket_travel as p LEFT JOIN gallery as g ON g.paket_travel_id = p.id WHERE p.id = $id") ?>
                                <?php foreach ($data as $data) : ?>
                                <a href="Admin/img/paket/<?= $data["image"] ?>"
                                    style="margin-right: 8px; margin-top: 5px;">
                                    <img src="Admin/img/paket/<?= $data["image"] ?>" alt="" width="160px" height="80px"
                                        class="xzoom-gallery" xpreview="Admin/img/paket/<?= $data["image"] ?>">
                                </a>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        <?php $id = $_GET["id"];
                        $data = query("SELECT * FROM paket_travel WHERE id = '$id'") ?>
                        <?php foreach ($data as $data) : ?>
                        <div class="tentang-wisata" style="margin-top: -50px;">
                            <h5>Tentang Wisata</h5>
                            <p>
                                <?= $data["about"] ?>
                            </p>
                        </div>

                        <div class="destinations" style="margin-top: -50px;">
                            <h5>Destinations</h5>
                            <p> <?= $data["destination"] ?>
                            </p>
                        </div>
                        <div class="fasilitas" style="margin-top: -50px; margin-bottom: 30px;">
                            <h5>Fasilitas</h5>
                            <p>
                                <?= $data["fasilitas"] ?>
                            </p>
                        </div>
                    </div>
                    <div class="card card-informations col col-4 offset-1"
                        style="border-bottom-left-radius:0 ; border-bottom-right-radius: 0;">
                        <span>Trip Informations</span>
                        <hr style="border: 1px solid rgb(190, 187, 187);">
                        <table class="table table-informations">
                            <tr>
                                <th style="width: 50%;;">Keberangkatan</th>
                                <td style="width: 50%;" class="text-right"> <?= $data["keberangkatan"] ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 50%;">Durasi</th>
                                <td style="width: 50%;" class="text-right"> <?= $data["duration"] ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 50%;">Banyak Orang</th>
                                <td style="width: 50%;" class="text-right"> <?= $data["orang"] ?> Orang</td>
                            </tr>
                            <tr>
                                <th style="width: 50%;">Harga</th>
                                <td style="width: 50%; " class="text-right"> <?= $data["harga"] ?>

                                </td>
                            </tr>
                        </table>
                        <div class="join">
                            <?php if (isset($_SESSION["id"])) : ?>
                            <button class="btn btn-block"
                                style="width: 380px; border-radius: 0; margin-left: -16px; background-color: #FFB468;"><a
                                    href="" style="color: white; text-decoration: none;"> Join
                                    Now</a>
                            </button>
                            <?php endif; ?>
                            <?php if (empty($_SESSION["id"])) : ?>
                            <button class="btn btn-block"
                                style="width: 380px; border-radius: 0; margin-left: -16px; background-color: #FFB468;"><a
                                    href="login_register.php" style="color: white; text-decoration: none;"> Login
                                    Sekarang</a>
                            </button>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <section class="footer">
        <div class="container">
            <hr style="border: 1px solid rgb(124, 124, 124); margin-bottom: -10px; opacity: .7;">
            <div class="footer d-flex" style="width: 100%; height: 80px;">
                <a href=""><img src="img/logo.svg" style="width: 152px;"></a>
                <div class="footer-nav d-flex " style="margin: auto">
                    <a href="" style="padding-right: 30px;">Pusat Bantuan</a>
                    <a href="">Follow Us</a>
                    <div class="icon">
                        <a href="">
                            <img src="img/icon-ig.png" alt="">
                        </a>
                        <a href="">
                            <img src="img/icon-fb.png" alt="">
                        </a>
                        <a href="">
                            <img src="img/icon-yt.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <hr style="border: 1.2px solid rgb(124, 124, 124); margin-top: 10px; opacity: .7;">
            <p class="text-center">&copy;Copyright Fajar Tour And Travel</p>
        </div>
    </section>




    <script src="Admin/Libraries/jquery/jquery-3.4.1.min.js "></script>
    <script src="Admin/Libraries/jquery-easing/jquery.easing.min.js"></script>
    <script src="Admin/Libraries/sweetalert2-master/dist/sweetalert2.all.min.js"></script>
    <script src="Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.js "></script>
    <script src="Libraries/xzoom/dist/xzoom.min.js"></script>
    <script>
    $("#xzoom-main, .xzoom-gallery").xzoom({
        zoomWidth: 500,
        title: false,
        tint: '#333',
        Xoffset: 20
    });
    </script>
</body>

</html>