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
    <title>Success</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
    <div class="container">
        <section class="success d-flex align-items-center mt-5">
            <div class="col text-center">
                <h2>YAY !!! BERHASIL </h2>
                <img src="img/success.svg" class="mt-3">
                <?php $idtransaksi = $_GET["id"];  ?>
                <h5 style="color: #FFB468;" class="font-weight-bold mt-3"><?= $idtransaksi; ?></h5>

                <p class="font-weight-bold">Selesaikan Pembayaranmu </p>
                <h3 class="text-center"><span>TRANSFER</span></h3>
                <h3 class="text-center"><span>A/N FAJAR TOUR AND TRAVEL</span></h3>
                <img src="img/logo-bank.png" style="width: 200px; height: 100px;" class="ml-5">
                <h4 class="text-center"><span>462384794623706</span></h4>
                <button class="btn btn-outline-primary mt-4 btn-ok" style="width: 150px;">OK</button>
            </div>

        </section>
    </div>
    <script src=" Admin/Libraries/jquery/jquery-3.4.1.min.js "></script>
    <script src=" Libraries/fontawesome-free/js/fontawesome.min.js "></script>
    <script src=" Admin/Libraries/bootstrap/js/bootstrap.js "></script>
    <script>
    $(".btn-ok").on("click", function() {
        location.href = "index.php"
    })
    </script>
</body>

</html>