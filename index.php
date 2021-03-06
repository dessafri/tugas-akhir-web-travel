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
    <title>HOME</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
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
                    <a class="dropdown-item" href="myAccount.php?id=<?= $_SESSION["id"] ?>">Edit Akun</a>
                    <a class="dropdown-item" href="myTransactions.php?id=<?= $_SESSION["id"] ?>">Transaksi Saya</a>
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
            <?php if ($roles == "ADMIN") : ?>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-lg"
                    style="width: 126px; height: 43px; margin: 0 10px;"><a href="Admin/index.php"
                        style="color: white; text-decoration: none;">
                        Admin</a>
                </button>
            </div>
            <?php endif; ?>
        </nav>
    </div>
    <main>
        <div class="jumbotron jumbotron-fluid"
            style="background: url('img/bg.png');  background-position: center; background-size: cover;">
            <div class="container">
                <div class="title">
                    <h1 class="display-4">FAJAR TOUR AND TRAVEL</h1>
                    <p class="lead">is The Best Place For Travel</p>
                    <!-- <hr class="my-4"> -->
                    <p class="col col-4">"Kami akan membawamu ke tempat terbaik yang Tidak Pernah Kamu Lihat Sebelumnya
                        "
                    </p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="cari.php" role="button">GET STARTED</a>
                    </p>
                </div>
            </div>
        </div>
        <section id="top-destination" class="top-destination" style="margin-top: 200px;">
            <div class="container d-flex justify-content-center" style="width: 100%;">
                <div class="section d-flex" style="width: 900px; ">
                    <div class="left col-6">
                        <h1>TOP DESTINATIONS <br> IN INDONESIA</h1>
                        <div class="card-destination"
                            style="background: url('img/destination-1.png'); width: 100%; height: 450px; background-size: cover;">
                            <h3 class="text-center">BALI</h3>
                        </div>
                    </div>
                    <div class="right col-6">
                        <div class="card-destination"
                            style="background: url('img/destination-2.png'); width: 100%; height: 300px; background-size: cover;">
                            <h3 class="text-center">MALANG</h3>
                        </div>
                        <p style="margin-top: 30px;">Bali adalah sebuah pulau di Indonesia yang dikenal karena memiliki
                            pegunungan berapi yang hijau, terasering sawah yang unik, pantai, dan terumbu karang yang
                            cantik. Terdapat banyak tempat wisata religi seperti Pura Uluwatu yang
                            berdiri di atas tebing. Di Selatan, kota pesisir pantai Kuta menawarkan wisata hiburan malam
                            yang tak pernah sepi, sementara Seminyak, Sanur, dan Nusa Dua dikenal dengan suguhan resort
                            yang populer.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section id="explore-indonesia" class="explore-indonesia" style="margin-top: 160px;">

            <span class="text-center d-block">EXPLORE</span>
            <h1 class="text-center ">INDONESIA</h1>

            <div class="travel-packages">
                <div class="container d-flex justify-content-center">
                    <div class="card-travel d-flex flex-wrap justify-content-center" style=" width: 70%;">
                    </div>
                </div>
            </div>

            <div class="btn-more d-flex justify-content-center">
                <button class="btn btn-outline-primary" style="margin-top: 40px; margin-bottom: 100px;"><a
                        href="cari.php" style=" text-decoration: none;">LEBIH
                        BANYAK</a></button>
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
    <script>
    fetch("dataTravel.php", {
            method: "GET"
        })
        .then(res => {
            return res.json();
        })
        .then(resJson => {
            let items = resJson.slice(0, 3).map(data =>
                `
            <div class="card" style="background: url('Admin/img/paket/${data.image}'); width: 30%; height: 400px; background-size: cover;">
                <h3 class="text-center mt-5"><a href="detail.php?id=${data.paket_travel_id}" style="color: white; text-decoration: none;">${data.title}</a></h3>
            </div>
            `

            )
            $(".card-travel").html(items);
        })
    </script>
</body>

</html>
)
$(".card-travel").html(items);
})
</script>
</body>

</html>