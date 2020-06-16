<?php


require("../../functions/functions.php");

$id = $_GET["id"];

$datas = query("SELECT * FROM transaksi WHERE id='$id'");


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fajar Tour Travel Admin</title>
    <link rel="stylesheet" href="../Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../Style/style.css">

    <!-- Style Paket Travel -->
    <link rel="stylesheet" href="Style/style-paket-travel.css">
</head>

<body>
    <div id="wrapper">
        <div class="sidebar h-auto">
            <div class="container">
                <nav class="navbar navbar-light" style="background-color: #4e73df;">
                    <a class="navbar-brand" href="../index.php"> Fajar Tour And Travel
                    </a>
                </nav>
                <div class="navigation">
                    <hr class="my-1">
                    <div class="dashboard">
                        <a href="../index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></h5>
                    </div>
                    <div class="paket-travel">
                        <a href="../Paket-travel/index.php"><i class="fas fa-bus"></i>Paket Travel</a></h5>
                    </div>
                    <div class="gallery">
                        <a href="../Gallery/index.php"><i class="fas fa-images"></i></i>Gallery</a></h5>
                    </div>
                    <div class="transaksi">
                        <a href="../Transaksi/index.php"><i class="fas fa-dollar-sign"></i>Transaksi</a></h5>
                    </div>
                    <hr class="my-1">
                </div>
            </div>
        </div>
        <div class="main_content h-100">
            <div class="header" id="header">
                <div class="user">
                    <span>Des Safri</span>
                    <img src="../img/dummy.jpg" id="admin-avatar">
                    <div class="floating-nav">
                        <div class="nav">
                            <div>
                                <a href="" class="profile"><i class="fas fa-user-alt"></i>Profile</a> <br>
                                <a href="" id="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <h3>Detail Transaksi</h3>
                    <div class="container mb-3">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <?php foreach ($datas as $data) : ?>
                                    <?php
                                        $iduser = $data["user_id"];
                                        $nama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM users WHERE id='$iduser'"));
                                        ?>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <td><?= $data["id"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID Pembeli</th>
                                        <td><?= $data["user_id"]; ?></td>
                                    </tr>
                                    <tr>

                                        <th>Nama Pembeli</th>
                                        <td><?= $nama["username"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Transaksi</th>
                                        <td><?= $data["total_transaksi"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><?= $data["status"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pembelian</th>
                                        <td>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Paket Travel</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        global $datas;
                                                        // $idtransaksi = $datas["id"];
                                                        // $result = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE id='$idtransaksi'");
                                                        // $rows = [];
                                                        // while ($row = mysqli_fetch_assoc($result)) {
                                                        //     $rows[] = $row;
                                                        // };

                                                        ?>
                                                    <?php foreach ($datas as $data) : ?>
                                                    <?php
                                                            $id_transaksi = $data["id"];
                                                            $result = mysqli_query($conn, "SELECT paket_travel_id FROM transaksi_detail WHERE transaksi_id='$id_transaksi'");

                                                            $id_paket = [];
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $id_paket[] = $row;
                                                            }
                                                            ?>
                                                    <?php foreach ($id_paket as $paket_name) : ?>
                                                    <?php
                                                                $id_paket = $paket_name["paket_travel_id"];
                                                                $nama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title FROM paket_travel WHERE id='$id_paket'"))
                                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?= $nama["title"]; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class=" footer mt-3 ">
                <div class=" container ">
                    <p class=" text-center ">&copy;Copyright Fajar Tour And Travel</p>
                </div>
            </div>
        </div>
    </div>






    <script src=" ../Libraries/fontawesome-free/js/fontawesome.min.js "></script>
    <script src=" ../Libraries/bootstrap/js/bootstrap.js "></script>
    <script src=" ../Libraries/jquery/jquery-3.4.1.min.js "></script>
</body>

</html>