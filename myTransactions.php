<?php

session_start();
require("functions/functions.php");

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

<body style="height: 100%; ">
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
                    <a class="dropdown-item" href="myAccount.php">Edit Akun</a>
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
        </nav>
    </div>
    <section class="my-transaction">
        <div class="container">
            <h3 class="text-center">My Transactions</h3>
            <section class="main-transaction h-100 " style="margin-bottom: 60px;">
                <div class="content" style="margin-top: 30px;">
                    <table class="table table-hover  table-bordered ">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">User ID</th>
                                <th class="text-center">Total Transaksi</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="bodyTabel" data-id="<?= $data_id ?>">

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah Paket Travel</h5>
                    <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                </div>
            </div>
        </div>
    </div>

    <script src="Admin/Libraries/jquery/jquery-3.4.1.min.js "></script>
    <script src="Admin/Libraries/jquery-easing/jquery.easing.min.js"></script>
    <script src="Admin/Libraries/sweetalert2-master/dist/sweetalert2.all.min.js"></script>
    <script src="Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Admin/Libraries/bootstrap/js/bootstrap.js "></script>
    <script>
    let id = $("#bodyTabel").attr("data-id");
    fetch(`dataTransaksi.php?id=${id}`, {
            method: "GET"
        })
        .then(res => {
            return res.json();
        })
        .then(resJson => {
            let data = resJson;
            let items = data.map(data =>
                `
                <tr id="${data.id}">
                    <td align="center">${data.id}</td>
                    <td align="center">${data.user_id}</td>
                    <td align="center">${data.total_transaksi}</td>
                    <td align="center">${data.status}</td>
                    <td align="center">
                        <button class="btn btn-sm btn-primary btn-view" data-toggle="modal" data-target="#galleryModal">
                                <i class="fas fa-eye fa-2x"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" name="delete" type="submit">
                                <i class="fas fa-trash-alt fa-2x"></i></a>
                        </button>
                        <div class="form-check-inline" style=" margin-top: 5px; position: absolute; margin-left: 5px;">
                        <input class="form-check-input myCheck" type="checkbox" value="${data.id}" data="${data.status}" name="checkbox[]" style="width: 25px; height: 25px;">
                        </div>
                    </td>
                </tr>
            `)
            $("#bodyTabel").html(items)
            event();
        })

    function event() {
        $(".btn-edit").attr("disabled", true)
        $(".btn-view").attr("disabled", true)
        $(".btn-delete").attr("disabled", true)
        $('.myCheck').on("change", function() {
            let data = [];
            $(':checkbox:checked').each(function(i) {
                data[i] = $(this).val();
            })

            if (data.length == 0) {
                $(".btn-edit").attr("disabled", true)
                $(".btn-view").attr("disabled", true)
                $(".btn-delete").attr("disabled", true)


            }
            if (data.length == 1) {
                $(".btn-edit").removeAttr("disabled")
                $(".btn-view").removeAttr("disabled")
                $(".btn-delete").removeAttr("disabled")


            }
            if (data.length > 1) {
                $(".btn-view").attr("disabled", true)
                $(".btn-delete").removeAttr("disabled")

            }
        })
        $(".btn-delete").on("click", function(e) {
            let id = [];
            Swal.fire({
                title: 'Are you sure?',
                text: 'You wont be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete !'
            }).then((result) => {
                if (result.value) {
                    $(":checkbox:checked").each(function(i) {
                        id[i] = $(this).val();
                    })
                    if (id.length == 0) {
                        Swal.fire({
                            title: 'Error !',
                            text: 'Centang Gallery Yang Mau Di Hapus !',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            showCancelButton: false
                        })
                    } else {
                        Swal.fire({
                            title: 'Deleted !',
                            text: 'Delete Success !',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            showCancelButton: false
                        }).then(function() {
                            const xhr = new XMLHttpRequest();

                            xhr.onload = function() {
                                function animation() {
                                    return new Promise(resolve => {
                                        for (let i = 0; i < id
                                            .length; i++) {
                                            $(`tr#${id[i]}`)
                                                .css(
                                                    'background-color',
                                                    '#ccc')
                                            $(`tr#${id[i]}`)
                                                .fadeOut(1000,
                                                    function() {
                                                        $(this)
                                                            .remove();
                                                    });
                                        }
                                    })
                                }
                                async function deleted() {
                                    let changeData =
                                        await animation();
                                }
                                deleted();
                                console.log(xhr.responseText)
                            }
                            xhr.open("POST", "deleteTransaksi.php");
                            xhr.setRequestHeader("Content-type",
                                "application/x-www-form-urlencoded")
                            xhr.send(`checkbox=${id}`);
                        })
                    }


                }
            })
            e.preventDefault();
        })
        $(".btn-edit").on("click", function() {
            let id = [];
            $("#modalLabel").html("Edit Status Transaksi")
            $("#modalBody").html(`
                <div class="form-group">
                    <label for="paket_travel"></label>
                    <select class="form-control" name="paket_travel_id" id="paket_travel_id">
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-update" style="margin-top: 10px;" name="submit">Update</button>
            `)
            $(":checkbox:checked").each(function(i) {
                id[i] = $(this).val();
            })
            $("#paket_travel_id").html(`
            <option value="SUCCESS" id="option-data">SUCCESS</option>
            `)
            $(".btn-update").on("click", function() {
                let status = $("#paket_travel_id").val();
                let formData = new FormData();
                formData.append("id", id);
                formData.append("status", status);

                fetch("edit.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(res => {
                        return res.text()
                    })
                    .then(resJson => {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Status Berhasil Di Ubah !',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000

                        })
                        setTimeout(() => {
                            $("#galleryModal")
                                .modal(
                                    "hide");
                            setTimeout(() => {
                                refresh();
                            }, 500);
                        }, 1500);
                    })
            })
        })
        $(".IN_CART").css("display", "none")
        $(".SUCCESS").css("display", "none")

        $(".btn-view").on("click", function() {
            $("#modalLabel").html("View Transaksi")
            let id = [];
            $(":checkbox:checked").each(function(i) {
                id[i] = $(this).val();
            })
            let formData = new FormData();
            formData.append("id", id)
            fetch("Admin/Transaksi/view.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => {
                    return res.text();
                })
                .then(resText => {
                    $("#modalBody").html(resText)
                })
        })

        $("#cari").on("keyup", function() {
            let keyword = this.value;
            const incrementCounter = () => {
                let formData = new FormData();
                formData.append("keyword", keyword.toUpperCase());
                fetch('cari.php', {
                    method: "POST",
                    body: formData
                }).then(response => {
                    return response.json();
                }).then(responseText => {
                    let data = responseText
                    let items = data.map(data =>
                        `<tr id="${data.id}">
                    <td align="center">${data.id}</td>
                    <td align="center">${data.user_id}</td>
                    <td align="center">${data.total_transaksi}</td>
                    <td align="center">${data.status}</td>
                    <td align="center">
                        <button class="btn btn-sm btn-primary btn-view" data-toggle="modal" data-target="#galleryModal">
                                <i class="fas fa-eye fa-2x"></i>
                        </button>
                        <button class="btn btn-sm btn-secondary btn-edit ${data.status}" data-toggle="modal" data-target="#galleryModal">
                                <i class="fas fa-pencil-alt fa-2x"></i>
                        </button>
                        <div class="form-check-inline" style=" margin-top: 5px; position: absolute; margin-left: 5px;">
                        <input class="form-check-input myCheck" type="checkbox" value="${data.id}" data="${data.status}" name="checkbox[]" style="width: 25px; height: 25px;">
                        </div>
                    </td>
                </tr>`
                    )
                    $("#bodyTabel").html(items)
                    event();
                })
            }
            const debounce = (fn, delay) => {
                return () => {
                    let timer;
                    clearTimeout(timer);
                    timer = setTimeout(() => {
                        fn();
                    }, delay);
                };
            };

            const debounceProductSearch = debounce(incrementCounter, 1000);
            debounceProductSearch();
        })

        function refresh() {
            location.reload()
        }
    }
    </script>
</body>

</html>