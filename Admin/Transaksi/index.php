<?php
require("../../functions/functions.php");
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
                                <a href="../../myAccount.php?id=<?= $_SESSION["id"] ?>" class="profile"><i
                                        class="fas fa-user-alt"></i>Profile</a> <br>
                                <a href="../logout.php" id="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <h3>Transaksi</h3>
                    <div class="form-group" style="margin-left: 35px;  position:absolute; margin-top: 100px;">
                        <input type="text" class="form-control" id="cari" placeholder="Enter Paket Travel">
                    </div>
                    <span><i class="fas fa-search fa-2x plus pr-2" id="logo-cari"
                            style="margin-left: 275px;  position:absolute;color: grey;"></i></span>
                    <div class="row" style="margin-top: 75px;">
                        <div class="container">
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
                                <tbody id="bodyTabel">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

    <script>
    fetch("dataTransaksi.php", {
            method: "GET"
        })
        .then(res => {
            return res.json()
        })
        .then(responseJson => {
            let data = responseJson;
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
                </tr>`)
            $("#bodyTabel").html(items)
            event()
        })

    function event() {
        $(".btn-edit").attr("disabled", true)
        $(".btn-view").attr("disabled", true)
        $('.myCheck').on("change", function() {
            let data = [];
            $(':checkbox:checked').each(function(i) {
                data[i] = $(this).val();
            })

            if (data.length == 0) {
                $(".btn-edit").attr("disabled", true)
                $(".btn-view").attr("disabled", true)


            }
            if (data.length == 1) {
                $(".btn-edit").removeAttr("disabled")
                $(".btn-view").removeAttr("disabled")


            }
            if (data.length > 1) {
                $(".btn-view").attr("disabled", true)

            }
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
            fetch("view.php", {
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