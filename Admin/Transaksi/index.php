<?php


require("../../functions/functions.php");

$datas = query("SELECT * FROM transaksi");


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

                <!-- <div class="toogle d-flex justify-content-center align-content-center" style="height: 200px;">
                    <div class="button m-auto d-flex" style="background-color: #587ef1; width: 50px; height: 50px; border-radius: 50%;">
                        <i class="fas fa-angle-left fa-3x m-auto" style="margin: auto; opacity: .8; cursor: pointer;"></i>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="main_content h-100">
            <div class="header">
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
                    <h3>Transaksi</h3>

                    <div class="row">
                        <div class="container">
                            <table class="table table-hover  table-bordered ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datas as $data) : ?>
                                    <tr>
                                        <th><?= $data["id"]; ?></th>
                                        <td><?= $data["user_id"]; ?></td>
                                        <td><?= $data["total_transaksi"]; ?></td>
                                        <td><?= $data["status"]; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">
                                                <a href="view.php?id=<?= $data["id"]; ?>" style="color: white;">
                                                    <i class="fas fa-eye fa-2x"></i></a>
                                            </button>
                                            <?php if (strtolower($data["status"]) != "success") : ?>
                                            <button class="btn btn-sm btn-secondary">
                                                <a href="edit.php?id=<?= $data["id"]; ?> " style="color: white;">
                                                    <i class="fas fa-pencil-alt fa-2x"></i></a>
                                            </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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






    <script src="../Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="../Libraries/bootstrap/js/bootstrap.js "></script>
    <script src="../Libraries/jquery/jquery-3.4.1.min.js "></script>
</body>

</html>