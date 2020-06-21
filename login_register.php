<?php

require("functions/functions.php");

session_start();

if (isset($_SESSION["id"])) {
    echo "<script>
    window.location = 'index.php'
    </script>";
}

if (isset($_POST["submit_register"])) {

    if (register($_POST) > 0) {
        echo "<script>alert('Register Berhasil')</script>";
    } else {
        echo mysqli_error($conn);
    }
} elseif (isset($_POST["submit_login"])) {

    login($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Register</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
    <div class="login-register">
        <div class="container d-flex flex-wrap" style=" height: 100vh;">
            <section class="title d-flex justify-content-between w-100">
                <img src="img/logoo.png" alt="logo" class="order-2" style="width: 150px; height: 100px;">
                <div class="title order-1 col-4">
                    <h1>EXPLORE <span>INDONESIA</span></h1>
                    <h1><span>WITH</span> US</h1>
                </div>
            </section>
            <section class="main d-flex w-80 " id="main-login">
                <div class="container d-flex" style=" width: 100%;">
                    <div class="gambar d-flex">
                        <div>
                            <img src="img/gb1.png" style="width: 230px; height: 193px;">
                            <img src="img/gb2.png" style="width: 230px; height: 309px;">
                        </div>
                        <div style="margin-left: -100px;">
                            <img src="img/gb4.png" style="width: 230px; height: 309px; ">
                            <img src="img/gb3.png" style="width: 230px; height: 193px;">
                        </div>
                    </div>
                    <div class="login-register d-flex flex-wrap justify-content-center"
                        style=" width: 70%; height: 100%;">
                        <div class="button-box d-flex justify-content-center"
                            style=" width: 70%; height: 40px; border-radius: 30px;">
                            <div class="btn" id="btn"></div>
                            <button type="button" id="btn-login">Login</button>
                            <button type="button" id="btn-register">Register</button>
                        </div>
                        <div class="form" style="display: flex; margin-top: -150px;">
                            <form class="form-login" style="width: 80%; left: 150px; top: 90px;" id="login"
                                method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" required>
                                    <label>Username</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" required>
                                    <label>Password</label>
                                </div>
                                <div class="forgotpassword d-flex justify-content-end mt-3">
                                    <a href="resetPassword.php" class="text-decoration-none">Forgot Password ?</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-login"
                                    name="submit_login"><span>LOGIN</span></button>
                                <div class="tidakadaakun d-flex justify-content-start mt-3">
                                    <h5>Belum Punya Akun ? <a href="" id="spanregis">REGISTER</a></h5>
                                    </a>
                                </div>
                            </form>
                            <form class="form-register" style="width: 80%; left: 550px; top: 90px;" id="register"
                                method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" required>
                                    <label>Username</label>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required>
                                    <label>Email</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" required>
                                    <label>Password</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="re-password" required>
                                    <label>Re-Password</label>
                                </div>
                                <!-- <div class="forgotpassword d-flex justify-content-end mt-3">
                            <a href="" class="text-decoration-none">Forgot Password ?</a>
                        </div> -->
                                <button type="submit" class="btn btn-primary btn-login"
                                    name="submit_register"><span>REGISTER</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>













    <script src="Admin/Libraries/jquery/jquery-3.4.1.min.js "></script>
    <script src="Admin/Libraries/jquery-easing/jquery.easing.min.js"></script>
    <script src="Admin/Libraries/sweetalert2-master/dist/sweetalert2.all.min.js"></script>
    <script src="Admin/Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.js "></script>

    <script>
    let register = document.querySelector("#register");
    let login = document.querySelector("#login");
    let btn = document.querySelector("#btn");
    let btnregister = document.querySelector("#btn-register");
    let btnlogin = document.querySelector("#btn-login");
    let spanregis = document.querySelector("#spanregis");

    $(btnregister).on('click', () => {
        $(register).css("left", "-210px")
        $(login).css({
            "left": "-550px",
            "top": "150px"
        })
        // $('#main-login').css("margin-top", "30px")
        $(btn).css("left", "45%")
        console.log("oke")
    })
    $(spanregis).on('click', (e) => {
        $(register).css("left", "-210px")
        $(login).css({
            "left": "-550px",
            "top": "150px"
        })
        // $('#main-login').css("margin-top", "30px")
        $(btn).css("left", "45%")
        e.preventDefault();
        console.log("oke")
    })
    $(btnlogin).on('click', () => {
        $(register).css("left", "550px")
        $(login).css("left", "150px")
        $(btn).css("left", "0")

    })
    </script>
</body>

</html>