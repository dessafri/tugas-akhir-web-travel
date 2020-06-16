<?php

$id = $_GET["id"];
require("../../functions/functions.php");

$datas = query("SELECT * FROM transaksi WHERE id='$id'");
if (isset($_POST["submit"])) {
    if (updateTransaksi($_POST) > 0) {
        echo "
        <script>alert('Data Berhasil Di Update')
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script>alert('Data gagal Di Update')</script>";
    }
}

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
                <div class="container mb-3">
                    <h3>Edit Transaksi</h3>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="transaksi"></label>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <select class="form-control" name="status_transaksi">
                                <?php foreach ($datas as $data) : ?>
                                <?php if (strtolower($data["status"]) == "in_cart") : ?>
                                <option>PENDING</option>
                                <?php endif; ?>
                                <?php if (strtolower($data["status"]) == "pending") : ?>
                                <option>SUCCESS</option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;"
                            name="submit">Update</button>
                    </form>

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