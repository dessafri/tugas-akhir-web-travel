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

?>oles = $result["roles"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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

    <div class="jumbotron jumbotron-fluid"
        style="background: url('img/bg.png');background-position: center; background-size: cover; height: 500px;">
        <div class="container d-flex" style=" height: 100%;">
            <form style="margin: auto; margin-top: 250px;" class="form-inline">
                <input type="text" class="form-control"
                    style="width: 500px; border-top-right-radius: 0; border-bottom-right-radius: 0;"
                    placeholder="Cari Lokasi Liburan ...." id="search">
                <button class="btn btn-primary my-2 my-sm-0" id="btn-search"
                    style=" border-top-left-radius: 0; border-bottom-left-radius: 0;">Search</button>
            </form>
        </div>
    </div>

    <section id="explore-indonesia" class="explore-indonesia" style="margin-top: 0px;">

        <div class="travel-packages">
            <div class="container d-flex justify-content-center">
                <div class="card-travel d-flex flex-wrap justify-content-center" style=" width: 70%;">

                </div>
            </div>
        </div>
    </section>


    <section class="footer" style="margin-top: 50px;">
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
            let items = resJson.map(data =>
                `
            <div class="card" style="background: url('Admin/img/paket/${data.image}'); width: 30%; height: 400px; background-size: cover;">
                <h3 class="text-center mt-5"><a href="detail.php?id=${data.paket_travel_id}" style="color: white; text-decoration: none;">${data.title}</a></h3>
            </div>
            `

            )
            $(".card-travel").html(items);
        })
    $("#btn-search").on("click", function(e) {
        let keyword = $("#search").val();
        let formData = new FormData();
        formData.append("keyword", keyword);
        fetch(`dataCari.php`, {
                method: "POST",
                body: formData
            })
            .then(res => {
                return res.json();
            })
            .then(res => {
                let items = res.map(data =>
                    `
            <div class="card" style="background: url('Admin/img/paket/${data.image}'); width: 30%; height: 400px; background-size: cover;">
                <h3 class="text-center mt-5"><a href="detail.php?id=${data.paket_travel_id}" style="color: white; text-decoration: none;">${data.title}</a></h3>
            </div>
            `)
                $(".card-travel").html(items);
            })

        e.preventDefault();
    })
    </script>
</body>

</html>