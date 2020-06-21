<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fajar Tour Travel Admin</title>
    <link rel="stylesheet" href="../Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../Style/style.css">

    <!-- Style Fallery -->
    <link rel="stylesheet" href="Style/style-paket-travel.css">


</head>

<body id="body">
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
            <div class="content" id="content">
                <div class="container">
                    <h3>Paket Travel</h3>
                    <div class="row" style="margin-top: 50px;">
                        <div class="form-group" style="margin-left: 35px;  position:absolute; margin-bottom: 35px;">
                            <input type="text" class="form-control" id="cari" placeholder="Enter Paket Travel">
                        </div>
                        <span><i class="fas fa-search fa-2x plus pr-2" id="logo-cari"
                                style="margin-left: 275px;  position:absolute;color: grey;"></i></span>
                        <button type="button" class="btn btn-primary offset-9 btn-plus" style="margin-bottom: 35px;"
                            id="btn-plus" data-toggle="modal" data-target="#galleryModal">
                            <i class="fas fa-plus plus pr-2" id="plus"></i>
                            Tambah Paket Travel
                        </button>

                        <div class="container" id="delete">
                            <table class="table table-hover  table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Paket Travel</th>
                                        </th>
                                        <th class="text-center">Durasi</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTabel"></tbody>
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
                            <div class="container mb-3" id="container-form">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" id="location" name="location">
                                </div>
                                <div class="form-group">
                                    <label ">About</label>
                                <textarea class=" form-control ckeditor textareaAbout" id="about" rows=" 3"
                                        name="about"></textarea>
                                </div>
                                <div class=" form-group ">
                                    <label>Duration</label>
                                    <input type="text" class=" form-control " id="duration" name="duration">
                                </div>
                                <div class=" form-group ">
                                    <label>Banyak Orang</label>
                                    <input type=" text " class="form-control" id="orang" name="orang">
                                </div>
                                <div class=" form-group ">
                                    <label ">Destination</label>
                                <textarea class=" form-control ckeditor" id="destination" rows="3"
                                        name="destination"></textarea>
                                </div>
                                <div class=" form-group ">
                                    <label>fasilitas</label>
                                    <textarea class=" form-control ckeditor" id="fasilitas" rows="3"
                                        name="fasilitas"></textarea>
                                </div>
                                <div class=" form-group ">
                                    <label>Harga</label>
                                    <input type=" text " class=" form-control mb-3 " id="harga" name="harga">
                                </div>
                                <button type=" submit" id="" class=" btn btn-primary btn-submit btn-block mt-3 "
                                    name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" footer">
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
    <script src="../Libraries/bootstrap/js/bootstrap.js "></script>
    <script src="../Libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
    fetch('dataTravel.php', {
            method: 'GET'
        })
        .then(res => {
            return res.json()
        })
        .then(responseJson => {
            let data = responseJson;
            let items = data.map(data =>
                `<tr id="${data.id}">
                    <td align="center">${data.title}</td>
                    <td align="center">${data.duration}</td>
                    <td align="center">${data.harga}</td>
                    <td align="center">
                        <button class="btn btn-sm btn-primary btn-view" data-toggle="modal" data-target="#galleryModal">
                                <i class="fas fa-eye fa-2x"></i>
                        </button>
                        <button class="btn btn-sm btn-secondary btn-edit" data-toggle="modal" data-target="#galleryModal">
                                <i class="fas fa-pencil-alt fa-2x"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" name="delete" type="submit">
                                <i class="fas fa-trash-alt fa-2x"></i></a>
                        </button>
                        <div class="form-check-inline" style=" margin-top: 5px; position: absolute; margin-left: 5px;">
                            <input class="form-check-input myCheck" type="checkbox" value="${data.id}" name="checkbox[]" style="width: 25px; height: 25px;">
                        </div>
                    </td>
                </tr>`
            )
            $("#bodyTabel").html(items)
            event();
        })

    function event() {
        $('#galleryModal').on('hide.bs.modal', function() {
            $("#title").val("")
            $("#location").val("")
            CKEDITOR.instances.about.setData("");
            $("#duration").val("")
            $("#orang").val("")
            CKEDITOR.instances.destination.setData("");
            CKEDITOR.instances.fasilitas.setData("");
            $("#harga").val("")

            $("#title").removeAttr("disabled")
            $("#location").removeAttr("disabled")
            CKEDITOR.instances.about.setReadOnly(false)
            $("#duration").removeAttr("disabled")
            $("#orang").removeAttr("disabled")
            CKEDITOR.instances.destination.setReadOnly(false)
            CKEDITOR.instances.fasilitas.setReadOnly(false)
            $("#harga").removeAttr("disabled")
            $(".btn-submit").attr("id", "")
        })
        $("#btn-plus").on("click", function() {
            $(".btn-submit").attr("id", "btn-add")
            $("#btn-add").css("display", "block")
            $("#btn-add").html("Submit")
            $("#modalLabel").html("Tambah Paket Travel")
            $("#btn-add").on("click", function() {
                let title = document.getElementById("title").value;
                let location = document.getElementById("location").value;
                let about = CKEDITOR.instances.about.getData()
                let duration = document.getElementById("duration").value;
                let orang = document.getElementById("orang").value;
                let destination = CKEDITOR.instances.destination.getData()
                let fasilitas = CKEDITOR.instances.fasilitas.getData()
                let harga = document.getElementById("harga").value;

                if (title == "" || location == "" || duration ==
                    "" || orang == "" || harga == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ada Bagian Yang Belum Kamu Isi !'
                    })
                } else {
                    let formData = new FormData();
                    formData.set("title", title);
                    formData.set("location", location);
                    formData.set("about", about);
                    formData.set("duration", duration);
                    formData.set("orang", orang);
                    formData.set("destination", destination);
                    formData.set("fasilitas", fasilitas);
                    formData.set("harga", harga);

                    fetch('tambah.php', {
                            method: "POST",
                            body: formData
                        })
                        .then(res => {
                            return res.json()
                        })
                        .then(resJson => {
                            if (resJson == "error") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Ada Bagian Yang Belum Kamu Isi !'
                                })
                            } else {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Data Berhasil Di Tambahkan !',
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
                            }
                        })

                }
                console.log("sukses")

            })
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
                            text: 'Centang Paket Yang Mau Di Hapus !',
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
                            xhr.open("POST", "delete.php");
                            xhr.setRequestHeader("Content-type",
                                "application/x-www-form-urlencoded")
                            xhr.send(`checkbox=${id}`);
                        })
                    }


                }
            })
            e.preventDefault();
        })
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
                $(".btn-edit").attr("disabled", true)
                $(".btn-view").attr("disabled", true)
                $(".btn-delete").removeAttr("disabled")

            }
        })
        $(".btn-edit").on("click", function() {
            let id;
            $("#modalLabel").html("Edit Paket Travel")
            $("#container-form").append(
                `<input type="hidden" class="form-control" id="id_travel" name="title">`)
            $(".btn-submit").attr("id", "btn-update")
            $("#btn-update").css("display", "block")
            $("#btn-update").html("Edit")
            $(":checkbox:checked").each(function(i) {
                id = $(this).val();
            })
            fetch(`dataEdit.php?id=${id}`, {
                    method: "GET"
                })
                .then(res => {
                    return res.json()
                })
                .then(resJson => {
                    let data = resJson
                    data.map(data => {
                        $("#title").val(data.title);
                        $("#location").val(data.location);
                        CKEDITOR.instances.about.setData(data.about);
                        $("#duration").val(data.duration);
                        $("#orang").val(data.orang);
                        CKEDITOR.instances.destination.setData(data.destination);
                        CKEDITOR.instances.fasilitas.setData(data.fasilitas);
                        $("#harga").val(data.harga);
                        $("#id_travel").val(data.id);
                    })
                })
            $("#btn-update").on("click", function() {
                let title = document.getElementById("title").value;
                let location = document.getElementById("location").value;
                let about = CKEDITOR.instances.about.getData()
                let duration = document.getElementById("duration").value;
                let orang = document.getElementById("orang").value;
                let destination = CKEDITOR.instances.destination.getData()
                let fasilitas = CKEDITOR.instances.fasilitas.getData()
                let harga = document.getElementById("harga").value;
                let id = document.getElementById("id_travel").value;
                if (title == "" || location == "" || duration ==
                    "" || orang == "" || harga == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ada Bagian Yang Kosong !'
                    })
                } else {
                    let formData = new FormData();
                    formData.append("id", id);
                    formData.append("title", title);
                    formData.append("location", location);
                    formData.append("about", about);
                    formData.append("duration", duration);
                    formData.append("orang", orang);
                    formData.append("destination", destination);
                    formData.append("fasilitas", fasilitas);
                    formData.append("harga", harga);

                    fetch('update.php', {
                            method: "POST",
                            body: formData
                        })
                        .then(res => {
                            return res.json()
                        })
                        .then(resJson => {
                            if (resJson == "error") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Ada Bagian Yang Belum Kamu Isi !'
                                })
                            } else {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Data Berhasil Di Ubah !',
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
                            }
                        })

                    console.log(formData1)

                }
            })
        })
        $(".btn-view").on("click", function() {
            let id;
            $(".btn-submit").attr("id", "btn-view")
            $("#btn-view").css("display", "none")
            $("#modalLabel").html("View Paket Travel")
            $(":checkbox:checked").each(function(i) {
                id = $(this).val();
            })
            $("#title").attr("disabled", "disabled")
            $("#location").attr("disabled", "disabled")
            CKEDITOR.instances.about.setReadOnly(true)
            $("#duration").attr("disabled", "disabled")
            $("#orang").attr("disabled", "disabled")
            CKEDITOR.instances.destination.setReadOnly(true)
            CKEDITOR.instances.fasilitas.setReadOnly(true)
            $("#harga").attr("disabled", "disabled")

            fetch(`dataEdit.php?id=${id}`, {
                    method: "GET"
                })
                .then(res => {
                    return res.json()
                })
                .then(resJson => {
                    let data = resJson
                    data.map(data => {
                        $("#title").val(data.title);
                        $("#location").val(data.location);
                        CKEDITOR.instances.about.setData(data.about);
                        $("#duration").val(data.duration);
                        $("#orang").val(data.orang);
                        CKEDITOR.instances.destination.setData(data.destination);
                        CKEDITOR.instances.fasilitas.setData(data.fasilitas);
                        $("#harga").val(data.harga);
                        $("#id_travel").val(data.id);
                    })
                })
        })
        $("#cari").on("keyup", function() {
            let keyword = this.value;
            const incrementCounter = () => {
                let formData = new FormData();
                formData.append("keyword", keyword);
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
                            <td align="center">${data.title}</td>
                            <td align="center">${data.duration}</td>
                            <td align="center">${data.harga}</td>
                            <td align="center">
                                <button class="btn btn-sm btn-primary btn-view" data-toggle="modal" data-target="#galleryModal">
                                        <i class="fas fa-eye fa-2x"></i>
                                </button>
                                <button class="btn btn-sm btn-secondary btn-edit" data-toggle="modal" data-target="#galleryModal">
                                        <i class="fas fa-pencil-alt fa-2x"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete" name="delete" type="submit">
                                        <i class="fas fa-trash-alt fa-2x"></i></a>
                                </button>
                                <div class="form-check-inline" style=" margin-top: 5px; position: absolute; margin-left: 5px;">
                                    <input class="form-check-input myCheck" type="checkbox" value="${data.id}" name="checkbox[]" style="width: 25px; height: 25px;">
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