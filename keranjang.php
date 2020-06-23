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
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body style="height: 100%;">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top d-flex justify-content-center">
            <a class="navbar-brand" href="index.php">
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
                <h1
                    style="margin-top: 20px; font-family: Assistant;font-weight: normal;font-size: 24px;text-align: left;color: #989898;">
                    Explore<span
                        style="font-family: Righteous;font-weight: normal;font-size: 28px;text-align: left;color: #989898; margin-left: 5px;">Indonesia</span>
                </h1>

            </div>
        </nav>
    </div>
    <div class="container">
        <span
            style="font-family: Assistant; font-weight: bold; font-size: 16px; text-align: left; color: #707070; margin-top: 50px; display: block;">Keranjang</span>
    </div>
    <section class="keranjang">
        <div class="container">
            <div class="card d-flex" style=" margin-top: 30px; margin-bottom: 100px;">
                <table class="table table-bordered"
                    style="width: 80%; margin-top: 30px; margin-left: auto; margin-right: auto;">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Destination</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Duration</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = $_SESSION["id"];
                        $data = query("SELECT * FROM transaksi WHERE user_id='$id' AND status ='IN_CART'");
                        ?>
                        <?php foreach ($data as $data) : ?>
                        <?php $idtransaksi = $data["id"];

                            $detail = query("SELECT * FROM transaksi_detail WHERE transaksi_id = '$idtransaksi'");
                            $idtravel = [];
                            foreach ($detail as $detail) {
                                $idtravel[] = $detail["paket_travel_id"];
                            }
                            ?>

                        <tr id="<?= $idtransaksi ?>">
                            <td>
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input position-static myCheck" type="checkbox"
                                        value="<?= $idtransaksi ?>">
                                </div>
                            </td>
                            <td><?= $idtransaksi  ?></td>
                            <td>Rp. <?= $data["total_transaksi"]; ?></td>
                            <?php foreach ($idtravel as $idtravel) : ?>
                            <?php $travel = query("SELECT title FROM paket_travel WHERE id='$idtravel'"); ?>
                            <?php foreach ($travel as $travel) ?>
                            <td><?= $travel["title"] ?>

                            </td>
                            <?php endforeach; ?>


                            <td class="d-flex" style="justify-content: center">
                                <button class="btn btn-sm btn-danger btn-delete"><i
                                        class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="action" style="margin-top: 50px; margin-right:7%; margin-bottom: 10px;">
                    <div class="container d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-checkout"
                            style="margin-left: 10px;">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="footer">
        <div class="container">
            <hr style="border: 1px solid rgb(124, 124, 124); margin-bottom: -10px; opacity: .7;">
            <div class="footer d-flex" style="width: 100%; height: 80px;">
                <a href="index.php"><img src="img/logo.svg" style="width: 152px;"></a>
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
    $(".btn-checkout").attr("disabled", true)
    $(".btn-delete").attr("disabled", true)
    $('.myCheck').on("change", function() {
        let data = [];
        $(':checkbox:checked').each(function(i) {
            data[i] = $(this).val();
        })
        if (data.length == 0) {
            $(".btn-checkout").attr("disabled", true)
            $(".btn-delete").attr("disabled", true)

        }
        if (data.length == 1) {
            $(".btn-checkout").removeAttr("disabled")
            $(".btn-delete").removeAttr("disabled")


        }
        if (data.length > 1) {
            $(".btn-checkout").attr("disabled", true)
            $(".btn-delete").removeAttr("disabled")

        }
    })
    $(".btn-delete").on("click", function(e) {
        let id = [];
        Swal.fire({
            title: 'Are you sure?',
            text: 'You wont be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete !'
        }).then((result) => {
            if (result.value) {
                $(":checkbox:checked").each(function(i) {
                    id[i] = $(this).val();
                })
                if (id.length == 0) {
                    Swal.fire({
                        title: 'Error !',
                        text: 'Centang Gallery Yang Mau Di Hapus !',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        showCancelButton: false
                    })
                } else {
                    Swal.fire({
                        title: 'Deleted !',
                        text: 'Delete Success !',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        showCancelButton: false
                    }).then(function() {
                        const xhr = new XMLHttpRequest();

                        xhr.onload = function() {
                            function animation() {
                                return new Promise(resolve => {
                                    for (let i = 0; i < id
                                        .length; i++) {
                                        $(`tr#${id[i]}`)
                                            .css(
                                                'background-color',
                                                '#ccc')
                                        $(`tr#${id[i]}`)
                                            .fadeOut(1000,
                                                function() {
                                                    $(this)
                                                        .remove();
                                                });
                                    }
                                })
                            }
                            async function deleted() {
                                let changeData =
                                    await animation();
                                $(".btn-checkout").attr("disabled", true)
                                $(".btn-delete").attr("disabled", true)
                            }
                            deleted();
                        }
                        xhr.open("POST", "deleteTransaksi.php");
                        xhr.setRequestHeader("Content-type",
                            "application/x-www-form-urlencoded")
                        xhr.send(`checkbox=${id}`);
                    })
                }


            }
        })
        e.preventDefault();
    })
    $(".btn-checkout").on("click", function(e) {
        let id = [];
        $(":checkbox:checked").each(function(i) {
            id[i] = $(this).val();
        })
        let travelid = id.toString();
        const xhr = new XMLHttpRequest();
        xhr.onload = function() {
            location.href = `checkout.php?id=${travelid}`;
        }
        xhr.open("GET", `checkout.php?id=${travelid}`);
        xhr.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded")
        xhr.send();

    })
    </script>
</body>

</html>