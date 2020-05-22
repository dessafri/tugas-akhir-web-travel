<?php

require("../functions/functions.php")


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
                    <a class="navbar-brand" href="index.html"> Fajar Tour And Travel
                    </a>
                </nav>
                <div class="navigation">
                    <hr class="my-1">
                    <div class="dashboard">
                        <a href="index.html"><i class="fas fa-tachometer-alt"></i>Dashboard</a></h5>
                    </div>
                    <div class="paket-travel">
                        <a href="Paket-travel/index.php"><i class="fas fa-bus"></i>Paket Travel</a></h5>
                    </div>
                    <div class="gallery">
                        <a href="Gallery/index.html"><i class="fas fa-images"></i></i>Gallery</a></h5>
                    </div>
                    <div class="transaksi">
                        <a href="Transaksi/index.html"><i class="fas fa-dollar-sign"></i>Transaksi</a></h5>
                    </div>
                    <hr class="my-1">
                </div>
            </div>
        </div>
        <div class="main_content" style="flex: 5;">
            <div class="header">
                <div class="user">
                    <span>Des Safri</span>
                    <img src="img/dummy.jpg" id="admin-avatar">
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
                    <h3>Dashboard</h3>
                    <div class="menu">
                        <div class="total-revenue">
                            <span class="text-center">Total income</span>
                            <span class="value"><i class="fas fa-dollar-sign "
                                    style="  color: #818181; margin-right: 8px;"></i>Rp.70.000.000</span>
                        </div>
                        <div class="revenue-month">
                            <span class="text-center">Income in Month</span>
                            <span class="value"><i class="fas fa-dollar-sign "
                                    style=" color: #818181; margin-right: 8px;"></i>Rp.10.000.000</span>
                        </div>
                        <div class="sukses">
                            <span class="text-center">Transactions Success</span>
                            <span class="value"><i class="fas fa-check "
                                    style=" color: #818181; margin-right: 8px;"></i>34</span>
                        </div>
                        <div class="pending">
                            <span class="text-center">Transactions pending</span>
                            <span class="value"><i class="fas fa-spinner "
                                    style=" color: #818181; margin-right: 8px;"></i>10</span>
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






    <script src="Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="Libraries/bootstrap/js/bootstrap.js "></script>
    <script src="Libraries/jquery/jquery-3.4.1.min.js "></script>
</body>

</html>