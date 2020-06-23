<?php

require("functions/functions.php");
session_start();

if ($_SESSION["id"] == "") {
    header("location: index.html");
}


if (empty($_GET["id"])) {
    header("location:index.php");
} else {
    $data_id = $_GET["id"];
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT roles FROM users WHERE id ='$id'"));
    $roles = $result["roles"];
} else {
    $roles = "GUEST";
}
// $id = $_POST["id"];
$id = $_SESSION["id"];

$data = query("SELECT * FROM users WHERE id = '$id' ");


?>


<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="Admin/Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body style="height: 100%;">
    <div class="container" style="position: relative;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <a class="navbar-brand col-4" href="index.php">
                <img src="img/logo.svg" width="152px" height="70px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cari.php">Paket Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
            <?php if ($id = "") : ?>
            <div class="button">
                <button type="button" class="btn btn-outline-primary"
                    style="width: 116px; height: 43px; margin: 0 10px;">Login</a></button>
                <button type="button" class="btn btn-primary" style="width: 116px; height: 43px;">Register</a></button>
            </div>
            <?php endif; ?>
            <?php if ($roles == "USER") : ?>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="width: 126px; height: 43px; margin: 0 10px;">
                    Akun Saya
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="myAccount.php?id=<?= $_SESSION["id"] ?>">Edit Akun</a>
                    <a class="dropdown-item" href="myTransactions.php?id=<?= $_SESSION["id"] ?>">Transaksi Saya</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($roles == "GUEST") : ?>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-lg"
                    style="width: 126px; height: 43px; margin: 0 10px;"><a href="login_register.php"
                        style="color: white; text-decoration: none;">
                        Login</a>
                </button>
            </div>
            <?php endif; ?>
            <?php if ($roles == "ADMIN") : ?>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-lg"
                    style="width: 126px; height: 43px; margin: 0 10px;"><a href="Admin/index.php"
                        style="color: white; text-decoration: none;">
                        Admin</a>
                </button>
            </div>
            <?php endif; ?>
        </nav>
    </div>
    <section class="profile">
        <div class="container">
            <h3 class="text-center">My Account</h3>
            <!-- <div class="avatar d-flex justify-content-center">
                <?php foreach ($data as $data) : ?>
                <?php $image = $data["image"]; ?>
                <img src="imageUser/<?= $image ?>" class="mt-3" id="image-profile" data-image="<?= $image ?>"
                    style="width: 75px; height: 75px;">
            </div> -->
            <section class="main-profile h-100 ">
                <div class="content">
                    <div class="form-group">
                        <label>ID Saya</label>
                        <input type="text" class="form-control" value="<?= $data['id'] ?>" id="idsaya" name="idsaya"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?= $data['nama'] ?>" id="nama" name="nama"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?= $data['username'] ?>" id="username"
                            name="username" readonly>
                    </div>
                    <div class=" form-group ">
                        <label>Email</label>
                        <input type="email" class=" form-control" value="<?= $data['email'] ?>" id="email" name="email"
                            readonly>
                    </div>
                    <div class=" form-group ">
                        <label>No Telepon</label>
                        <input type="text" class=" form-control" value="<?= $data['no_telp'] ?>" id="no_telp"
                            name="no_telp" readonly>
                    </div>
                    <!-- <div class="form-group" style="margin-top: 10px;">
                        <label for="input_file">Image Profile</label><br>
                        <img src="" alt="image-preview" id="image-after"
                            style="width: 150px; height: 100px; margin-bottom: 20px;">
                        <input type="file" class="form-control-file" id="input_file" name="gambar"
                            accept="image/png, image/jpeg, image/jpg" disabled>
                    </div> -->
                    <button type="submit" class=" btn btn-primary btn-ganti-profile btn-block btn-submit"
                        style="margin-top: 20px; margin-bottom: 30px;">Ganti
                        Profile</button>

                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </section>

    <script src="Admin/Libraries/jquery/jquery-3.4.1.min.js "></script>
    <script src="Admin/Libraries/jquery-easing/jquery.easing.min.js"></script>
    <script src="Admin/Libraries/sweetalert2-master/dist/sweetalert2.all.min.js"></script>
    <script src="Admin/Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.js "></script>
    <script>
    let button = $('.btn-submit');
    $("#image-after").hide();

    $(button).on('click', (e) => {
        // console.log(name)
        $("#input_file").attr("disabled", "disabled");
        // let image = $("#image-profile").attr("data-image");

        if (button.hasClass("btn-ganti-profile")) {
            setTimeout(() => {
                $('input').removeAttr("readonly")
                $('input').removeAttr("disabled")
                $('#idsaya').attr("disabled", "disabled");
                $("#input_file").removeAttr("disabled")
                $(button).removeClass("btn-ganti-profile");
                $(button).removeClass("btn-primary");
                $(button).addClass("btn-simpan-profile");
                $(button).addClass("btn-success");
                $(button).html("Simpan Profile");
            }, 200);
        } else {

            let id = $("#idsaya").val()
            let nama = $("#nama").val()
            let username = $("#username").val()
            let email = $("#email").val()
            let no_telp = $("#no_telp").val()
            let formData = new FormData();
            formData.append("id", id)
            formData.append("nama", nama)
            formData.append("username", username)
            formData.append("email", email)
            formData.append("no_telp", no_telp)
            fetch("dataAkun.php", {
                    method: "POST",
                    body: formData
                }).then(res => {
                    return res.text();
                })
                .then(resjson => {
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data Berhasil Di Perbarui !',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    })
                    setTimeout(() => {
                        $('input').attr("readonly", "true")
                        $('input').attr("disabled", "true")
                        $("#input_file").attr("disabled", 'disabled');
                        $(button).addClass("btn-ganti-profile");
                        $(button).addClass("btn-primary");
                        $(button).removeClass("btn-simpan-profile");
                        $(button).removeClass("btn-success");
                        $(button).html("Ganti Profile");
                    }, 1200);
                })



        }



        e.preventDefault()

    })
    </script>
</body>

</html>