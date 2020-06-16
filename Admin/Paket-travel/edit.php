<?php

require("../../functions/functions.php");
$id = $_GET["id"];
$data = query("SELECT * FROM paket_travel WHERE id='$id'");

if (isset($_POST["submit"])) {
    if (updateDataTravel($_POST) > 0) {
        echo "
        <script>alert('Data Berhasil Di Update')
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script>alert('Data gagal Di Update')</script>";
    }
}


?>


<!DOCTYPE php>
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
                    <h3>Edit Paket Travel</h3>
                    <div class="container mb-3">
                        <form action="" method="POST">
                            <input type="text" name="id" value="<?= $data[0]["id"] ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?= $data[0]["title"] ?>">
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="<?= $data[0]["location"] ?>">
                            </div>
                            <div class="form-group">
                                <label ">About</label>
                                    <textarea class=" form-control " id=" text-area " 
                                    rows=" 3 " name=" about"><?= $data[0]["about"] ?></textarea>
                            </div>
                            <div class=" form-group ">
                                <label>Duration</label>
                                <input type=" text " class=" form-control " id=" duration " name="duration"
                                    value=" <?= $data[0]["duration"] ?>">
                            </div>
                            <div class=" form-group ">
                                <label>Banyak Orang</label>
                                <input type=" text " class=" form-control " id=" orang " name="orang"
                                    value="<?= $data[0]["orang"] ?>">
                            </div>
                            <div class=" form-group ">
                                <label ">Destination</label>
                                <textarea class=" form-control" id="text-area" rows="3"
                                    name="destination"><?= $data[0]["destination"] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label ">Fasilitas</label>
                                    <textarea  class=" form-control " id=" text-area " rows=" 3 " 
                                    name=" fasilitas"><?= $data[0]["fasilitas"] ?></textarea>
                            </div>
                            <div class=" form-group ">
                                <label>Harga</label>
                                <input type=" text " class=" form-control mb-3 " id=" harga " name="harga"
                                    value=" <?= $data[0]["harga"] ?>">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Update Data</button>


                        </form>

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