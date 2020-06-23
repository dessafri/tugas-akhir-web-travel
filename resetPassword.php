<?php
session_start();

if (isset($_SESSION["id"])) {
    echo "<script>
    window.location = 'index.php'
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
    <div class="login-register">
        <div class="container  flex-wrap" style=" height: 100vh;">
            <section class="title d-flex justify-content-between w-100">
                <img src="img/logoo.png" alt="logo" class="order-2" style="width: 150px; height: 100px;">
                <div class="title order-1 col-4">
                    <h1>EXPLORE <span>INDONESIA</span></h1>
                    <h1><span>WITH</span> US</h1>
                </div>
            </section>
            <section class="main"
                style="background-color: rgb(201, 201, 201); width: 80%; margin-left: 80px; height: 40vh;" id="main">
                <h3 style="padding-top: 20px; padding-left: 30px; ">Reset Password</h3>
                <div class="form-group" style="padding-top: 20px; padding-left: 30px;">
                    <label for="username">Masukkan Username Kamu</label>
                    <input type="text" name="username" class="form-control" style="width: 50%;" id="username"
                        aria-describedby="Help">
                </div>
                <button type="button" name="submit" id="btn_cek_username" style="margin-left: 30px;"
                    class="btn btn-primary">Cek
                    Username</button>
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
    $("#btn_cek_username").on("click", function() {
        let username = $("#username").val();
        fetch(`dataResetpassword.php?username=${username}`, {
                method: "GET"
            })
            .then(res => {
                return res.json();
            })
            .then(resjson => {
                if (resjson == "success") {
                    $("#main").html(`
                    
                    <h3 style="padding-top: 20px; padding-left: 30px; ">Reset Password</h3>
                <div class="form-group" style="padding-top: 20px; padding-left: 30px;">
                    <label for="username">Masukkan Password Baru</label>
                    <input type="password" class="form-control" style="width: 50%;" id="password"
                        aria-describedby="Help">
                </div>
                <div class="form-group" style="padding-top: 20px; padding-left: 30px;">
                    <label for="username">Konfirmasi Password</label>
                    <input type="password" class="form-control" style="width: 50%;" id="konfirmasiPassword"
                        aria-describedby="Help">
                </div>
                <button type="button" name="submit" id="btn_ganti" style="margin-left: 30px;"
                    class="btn btn-primary">Cek
                    Username</button>
                    `)
                    $("#main").css("height", "50vh")
                    $("#btn_ganti").on("click", function() {
                        let password = $("#password").val();
                        let konfirmasiPassword = $("#konfirmasiPassword").val();
                        let result = password.localeCompare(konfirmasiPassword);
                        if (result == false) {
                            let formData = new FormData();
                            formData.append("username", username);
                            formData.append("password", password);
                            fetch("updatePassword.php", {
                                    method: "POST",
                                    body: formData
                                })
                                .then(res => {
                                    return res.json()
                                })
                                .then(resJson => {
                                    Swal.fire({
                                        title: 'YAY...',
                                        text: 'Password Berhasil di Ganti ..',
                                        icon: 'success'
                                    }).then(function() {

                                        window.location = "login_register.php"
                                    })
                                })

                        } else {
                            Swal.fire({
                                title: 'Oppss...',
                                text: 'Konfirmasi Sandi Tidak Cocok..',
                                icon: 'error'

                            })
                        }


                    })
                } else {
                    Swal.fire({
                        title: 'Oppss...',
                        text: 'Username tidak di temukan ..',
                        icon: 'error'

                    })
                    $("#username").val("")
                }
            })
    })
    </script>
</body>

</html>