<?php
session_start();
require("functions/functions.php");

if ($_SESSION["id"] == "") {
    header("location: index.php");
}


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
    <title>Checkout</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body style="height: 100%;">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top d-flex justify-content-center">
            <a class="navbar-brand" href="#">
                <img src="img/logo.svg" width="152px" height="89px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                style="border: .9px solid rgb(172, 172, 172); height: 60%; margin-left: -30px; margin-right: 10px; margin-top: 20px;">
            </div>
            <div class="title d-flex">
                <h1 style="margin-top: 20px; font-family: Assistant;
                font-weight: normal;
                font-size: 24px;
                text-align: left;
                color: #989898;
                ">Explore<span
                        style="font-family: Righteous;font-weight: normal;font-size: 28px;text-align: left;color: #989898; margin-left: 5px;">Indonesia</span>
                </h1>

            </div>
        </nav>
    </div>
    <div class="container">
        <span style="font-family: Assistant;
        font-weight: bold;
        font-size: 16px;
        text-align: left;
        color: #707070;
        margin-top: 50px;
        display: block;
        ">Checkout</span>
    </div>




    <section class="keranjang">
        <div class="container">
            <div class="card d-flex" style=" margin-top: 30px; margin-bottom: 100px; ">
                <div class="container">
                    <h5 class="font-weight-bold" style="font-size: 16px;  margin-top: 5px; color: #707070;">Pesanan Saya
                    </h5>
                    <div class="pesanan">
                        <table class="table table-borderless">
                            <?php
                            $idtransaksi = $_GET["id"];
                            $data = query("SELECT paket_travel_id FROM transaksi_detail WHERE transaksi_id = '$idtransaksi'") ?>
                            <?php foreach ($data as $data) : ?>

                            <?php
                                $paket = query("SELECT * FROM paket_travel AS p JOIN gallery as g ON g.paket_travel_id = p.id WHERE p.id = '$data[paket_travel_id]' LIMIT 1") ?>
                            <?php foreach ($paket as $data) : ?>
                            <tr>
                                <td>
                                    <img src="Admin/img/paket/<?= $data["image"] ?>"
                                        style="width: 100px; height: 50px;">
                                    <span style="font-family: Assistant;
                                    font-weight: bold;
                                    font-size: 14px;
                                    text-align: left;
                                    color: #7d7c7c; margin-left: 10px;
                                    "><?= $data["title"]; ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php $transaksi = query("SELECT * FROM transaksi WHERE id = '$idtransaksi'") ?>
                    <input type="hidden" id="transaksi_id" value="<?= $idtransaksi ?>">
                    <?php foreach ($transaksi as $data) : ?>
                    <div class="total-pesanan">
                        <h5 style="font-size: 16px;  margin-top: 5px; color: #707070; font-weight: bold;">Pesan</h5>
                        <div class="pesanan d-flex" style="justify-content: space-between;">
                            <span style="font-size: 14px; color: #707070; font-weight: normal;">Total
                                Pesanan <span>1</span></span>
                            <span style="font-size: 14px; color: #707070; font-weight: bold;">Rp.
                                <?= number_format($data["total_transaksi"], 2, ',', '.') ?></span>
                        </div>
                    </div>

                    <div class="metode-pembayaran" style="margin-top: 30px;">
                        <h5 class="font-weight-bold" style="font-size: 16px;  margin-top: 5px; color: #707070;">Metode
                            Pembayaran
                        </h5>
                        <span style="font-size: 14px; color: #707070; font-weight: normal;">Transfer</span>
                    </div>

                    <div class="rincian-pembayaran" style="margin-top: 30px;">
                        <div class="sub-pembayaran d-flex" style="justify-content: space-between;">
                            <span style="font-size: 14px; color: #707070; font-weight: normal;">Sub Total Pesanan</span>
                            <span style="font-size: 14px; color: #707070; font-weight: bold;">Rp.
                                <?= number_format($data["total_transaksi"], 2, ',', '.') ?></span>
                        </div>
                        <div class="kode-unik d-flex mt-3" style="justify-content: space-between;">
                            <span style="font-size: 14px; color: #707070; font-weight: normal;">Kode Unik</span>
                            <?php $randomnumber = rand(10, 1000) ?>
                            <span
                                style="font-size: 14px; color: #707070; font-weight: bold; color: rgb(248, 89, 32);"><?= $randomnumber; ?></span>
                        </div>
                        <div class="sub-pembayaran d-flex mt-3" style="justify-content: space-between;">
                            <span style="font-size: 14px; color: #707070; font-weight: normal;">Total Pembayaran</span>
                            <span style="font-size: 14px; color: #707070; font-weight: bold;">Rp.
                                <?= number_format($data["total_transaksi"], 0, ',', '.') . "." . $randomnumber ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="action" style="margin-top: 50px; margin-bottom: 10px;">
                    <div class="container d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-bayar" style="width: 100px;">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
    $(".btn-bayar").on("click", function() {
        let id_transaksi = $("#transaksi_id").val();
        let formData = new FormData();
        formData.append("id", id_transaksi);
        fetch("updateTransaksi.php", {
                method: "POST",
                body: formData
            })
            .then(Res => {
                return Res.json();
            })
            .then(res => {
                fetch(`success.php?id=${id_transaksi}`, {
                        method: "GET"
                    })
                    .then(res => {
                        return res.text()
                    })
                    .then(Res => {
                        location.href = `success.php?id=${id_transaksi}`
                    })
            })
    })
    </script>
</body>

</html>