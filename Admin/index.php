<?php

require("../functions/functions.php");
session_start();

if ($_SESSION["id"] == "") {
    header("location: ../index.php");
} else {
    $id = $_SESSION["id"];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT roles FROM users WHERE id ='$id'"));
    $roles = $result["roles"];
    if ($roles == "USER") {
        header("Location: ../index.php");
    }
}

$paket_travel = query("SELECT COUNT(id) FROM paket_travel");
$pending = query("SELECT COUNT(id) FROM transaksi WHERE status = 'PENDING'");
$success = query("SELECT COUNT(id) FROM transaksi WHERE status = 'SUCCESS'");
$total = query("SELECT SUM(total_transaksi) FROM transaksi");
$paket;
foreach ($paket_travel as $data) {
    $paket = $data["COUNT(id)"];
}

$statusPending;
foreach ($pending as $data) {
    $statusPending = $data["COUNT(id)"];
}
$statusSuccess;
foreach ($success as $data) {
    $statusSuccess = $data["COUNT(id)"];
}
$totalTransaksi;
foreach ($total as $data) {
    $totalTransaksi = $data["SUM(total_transaksi)"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fajar Tour Travel Admin</title>
    <link rel="stylesheet" href="Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
    <div id="wrapper">
        <div class="sidebar">
            <div class="container">
                <nav class="navbar navbar-light" style="background-color: #4e73df;">
                    <a class="navbar-brand" href="index.php"> Fajar Tour And Travel
                    </a>
                </nav>
                <div class="navigation">
                    <hr class="my-1">
                    <div class="dashboard">
                        <a href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></h5>
                    </div>
                    <div class="paket-travel">
                        <a href="Paket-travel/index.php"><i class="fas fa-bus"></i>Paket Travel</a></h5>
                    </div>
                    <div class="gallery">
                        <a href="Gallery/index.php"><i class="fas fa-images"></i></i>Gallery</a></h5>
                    </div>
                    <div class="transaksi">
                        <a href="Transaksi/index.php"><i class="fas fa-dollar-sign"></i>Transaksi</a></h5>
                    </div>
                    <hr class="my-1">
                </div>
            </div>
        </div>
        <div class="main_content" style="flex: 5;">
            <div class="header">
                <div class="user">
                    <?php
                    $id = $_SESSION["id"];
                    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'"));
                    $username = $result["username"];  ?>
                    <span id="admin-avatar" style="cursor: pointer;"><?= $username; ?></span>
                    <div class="floating-nav">
                        <div class="nav">
                            <div>
                                <a href="../myAccount.php?id=<?= $_SESSION["id"] ?>" class="profile"><i
                                        class="fas fa-user-alt"></i>Profile</a> <br>
                                <a href="../logout.php" id="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <h3>Dashboard</h3>
                    <div class="menu">
                        <div class="total-revenue">
                            <span class="text-center">Total income</span>
                            <span class="value text-center">Rp.
                                <?= number_format($totalTransaksi, 2, ',', '.') ?></span>
                        </div>
                        <div class="revenue-month">
                            <span class="text-center">Paket Yang Tersedia</span>
                            <span class="value text-center"><?= $paket; ?> Paket Travel</span>
                        </div>
                        <div class="sukses">
                            <span class="text-center">Transactions Success</span>
                            <span class="value text-center"><?= $statusSuccess; ?> Transaksi</span>
                        </div>
                        <div class="pending">
                            <span class="text-center">Transactions pending</span>
                            <span class="value text-center"><?= $statusPending; ?> Transaksi</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="container">
                    <p class="text-center">&copy;Copyright Fajar Tour And Travel</p>
                </div>
            </div>
        </div>
    </div>






    <script src="../Libraries/jquery/jquery-3.4.1.min.js "></script>
    <script src="../Libraries/jquery-easing/jquery.easing.min.js"></script>
    <script src="../Libraries/sweetalert2-master/dist/sweetalert2.all.min.js"></script>
    <script src="../Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="../Libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Libraries/bootstrap/js/bootstrap.js "></script>
</body>

</html>