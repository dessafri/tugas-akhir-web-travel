<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fajar Tour Travel Admin</title>
    <link rel="stylesheet" href="../Libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../Libraries/fontawesome-free/css/all.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../Style/style.css">

    <!-- Style Fallery -->
    <link rel="stylesheet" href="Style/style-gallery.css">


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
                    <h3>Gallery Travel</h3>
                    <div class="row" style="margin-top: 50px;">
                        <div class="form-group" style="margin-left: 35px;  position:absolute; margin-bottom: 35px;">
                            <input type="text" class="form-control" id="cari" placeholder="Enter Paket Travel">
                        </div>
                        <span><i class="fas fa-search fa-2x plus pr-2" id="logo-cari"
                                style="margin-left: 275px;  position:absolute;color: grey;"></i></span>
                        <button type="button" class="btn btn-primary offset-9 btn-plus" style="margin-bottom: 35px;"
                            id="btn-plus" data-toggle="modal" data-target="#galleryModal">
                            <i class="fas fa-plus plus pr-2" id="plus"></i>
                            Tambah Gallery
                        </button>

                        <div class="container" id="delete">
                            <table class="table table-hover  table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="text-center">Paket Travel</th>
                                        <th class="text-center">Gallery</th>
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Tambah Gallery</h5>
                            <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modalBody">
                            <div class="container mb-3">
                                <div class="form-group">
                                    <label for="paket_travel"></label>
                                    <select class="form-control" name="paket_travel_id" id="paket_travel_id">
                                        <option value="default" id="option-data">Pilih Paket Travel</option>

                                    </select>
                                </div>
                                <div class="img-preview">
                                    <img src="" alt="image-preview" id="image-preview"
                                        style="width: 150px; height: 100px;">
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="input_file">Pilih Gambar</label>
                                    <input type="file" class="form-control-file" id="input_file" name="gambar"
                                        accept="image/png, image/jpeg, image/jpg">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block btn-submit" name="submit"
                                    id="btn-upload">Submit
                                </button>

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
    <script src="../Libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Libraries/jquery-easing/jquery.easing.min.js"></script>
    <script src="../Libraries/sweetalert2-master/dist/sweetalert2.all.min.js"></script>
    <script src="../Libraries/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="../Libraries/bootstrap/js/bootstrap.js "></script>
    <!-- <script src="script/script.js"></script> -->
    <script>
    fetch('../Paket-travel/dataTravel.php', {
            method: 'POST'
        })
        .then(response => {
            return response.json();
        })
        .then(responseJson => {
            let data = responseJson
            let option = data.map(data =>
                `
            <option value="${data.id}">${data.title}</option>
            `

            )
            $("#paket_travel_id").append(option)
        })
        .catch(err => console.log(err))

    fetch('data.php', {
            method: 'POST'
        })
        .then(response => {
            return response.json();
        })
        .then(responseJson => {
            let data = responseJson
            let items = data.map(data => `
                <tr id="${data.id}">
                    <td align="center">${data.title}</td>
                    <td align="center"><img src="../img/paket/${data.image}"style="width: 150px; height: 100px;">
                    </td>
                    <td align="center">
                        <button class="btn btn-sm btn-secondary btn-edit" data-toggle="modal" data-target="#galleryModal" data-id="${data.paket_travel_id}">
                                <i class="fas fa-pencil-alt fa-2x"></i>
                        </button>

                        <button class="btn btn-sm btn-danger btn-delete" name="delete" type="submit">
                                <i class="fas fa-trash-alt fa-2x"></i></a>
                        </button>



                        <div class="form-check-inline" style=" margin-top: 5px; position: absolute; margin-left: 5px;">
                            <input class="form-check-input myCheck" type="checkbox" value="${data.id}" data-id="${data.paket_travel_id}" data-image="${data.image}" name="checkbox[]" style="width: 25px; height: 25px;">
                        </div>
                    </td>
                </tr>
        `)
            $("#bodyTabel").html(items)
            event();
        })

    function event() {
        function close() {
            $('select').val("default")
            $('#image-preview').hide();
            $('#input_file').val('')
            $("input[type='file']").attr("disabled", 'disabled');
            $("#btn-upload").prop('disabled', true);
            $("#btn-upload").removeClass("btn-primary");
            $("#btn-upload").addClass("btn-secondary");
            $("#image-after").hide();
        }

        function disabled() {
            $("input[type='file']").attr("disabled", 'disabled');
            $("#btn-upload").prop('disabled', true);
            $("#btn-upload").removeClass("btn-primary");
            $("#btn-upload").addClass("btn-secondary");
        }

        function enabled() {
            $("input[type='file']").removeAttr("disabled");
        }
        // // ketika modal di close
        $('#galleryModal').on('hide.bs.modal', function() {
            $("#btn-edit-gambar").attr("id", " btn-upload")
            close();
        })
        $("#btn-edit").on("click", function(e) {
            e.preventDefault();
        })
        // mengubah perilaku dari link

        $(".btn-edit").attr("disabled", true)
        $('.myCheck').on("change", function() {
            let data = [];
            $(':checkbox:checked').each(function(i) {
                data[i] = $(this).val();
            })

            if (data.length == 0) {
                $(".btn-edit").attr("disabled", true)

            }
            if (data.length == 1) {
                $(".btn-edit").removeAttr("disabled")

            } else {
                $(".btn-edit").attr("disabled", true)

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
        $(".btn-edit").on("click", function(e) {
            $('select').attr("disabled", "disabled")
            let valueCheckbox = []
            let dataImage;
            $(':checkbox:checked').each(function(i) {
                valueCheckbox[i] = $(this).val();
                dataImage = $(this).attr("data-image");

            })
            if (valueCheckbox.length == 0) {
                Swal.fire({
                    title: 'Error !',
                    text: 'Centang Data Yang Mau Di Edit !',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    showCancelButton: false
                })
            }
            if (valueCheckbox.length > 1) {
                Swal.fire({
                    title: 'Error !',
                    text: 'Pilih Salah Satu !',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    showCancelButton: false
                })
            } else {
                let id = $(this).attr("data-id");
                $("#modalLabel").html("Edit Gallery");
                $('#image-preview').attr('src', `../img/paket/${dataImage}`);
                $('#image-preview').show();

                $("select").val(id);
                enabled();
                $("#btn-upload").attr("id", "btn-edit-gambar")

                $("#input_file").on("change", function() {
                    $("#btn-edit-gambar").removeAttr("disabled");
                    $("#btn-edit-gambar").removeClass("btn-secondary");
                    $("#btn-edit-gambar").addClass("btn-primary");
                    // membaca inputan gambar
                    let file = this.files[0];
                    let fileSize = this.files[0].size;
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        setTimeout(() => {
                            $("#spanTitle").show();
                            $("#image-after").show();
                            $('#image-after').attr('src', e.target
                                .result);
                        }, 750);
                        // $('#image-preview').attr('src', e.target.result);

                    }

                    reader.readAsDataURL(file);
                    if (fileSize > 2000000) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Ukuran Terlalu Besar !'
                        }).then(function() {
                            $('#input_file').val('')
                            $('#image-preview').hide();
                            $("#btn-upload").prop('disabled', true);
                            $("#btn-upload").removeClass(
                                "btn-primary");
                            $("#btn-upload").addClass(
                                "btn-secondary");
                        })

                    } else {
                        // handle upload image
                        let idtravel = valueCheckbox.toString();
                        let formData = new FormData();
                        formData.set("image", file);
                        formData.append("id", idtravel);

                        // upload gambar
                        $('#btn-edit-gambar').on("click", function() {
                            fetch('edit.php', {
                                method: "POST",
                                body: formData
                            }).then(response => {
                                return response.text();
                            }).then(responseText => {
                                // console.log(fileAfterArray);

                                function success() {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: 'Data Berhasil Di Ganti !',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1000

                                    })

                                }
                                async function refresh() {
                                    let promise =
                                        await success()
                                    setTimeout(() => {
                                        $("#galleryModal")
                                            .modal(
                                                "hide");
                                        setTimeout(
                                            () => {
                                                location
                                                    .reload();
                                            }, 500);
                                    }, 1500);
                                }
                                $("#checkboxForm").prop("checked",
                                    false);
                                refresh();
                            })
                        })
                    }
                })
            }
            e.preventDefault()
        })

        $('#btn-plus').on("click", function(e) {
            $("#spanTitle").hide();
            $("#modalLabel").html("Tambah Gallery");
            $('select').removeAttr("disabled");
            $(".btn-submit").attr("id", "btn-upload");
            $("#btn-upload").attr("disabled", "disabled");
            $("#btn-upload").removeClass(
                "btn-primary");
            $("#btn-upload").addClass(
                "btn-secondary");
            e.preventDefault();
        })
        // preview image hide
        $('#image-preview').hide();
        // set input file disable
        disabled();
        $('#paket_travel_id').on("change", function() {
            // cek apakah value default
            if (this.value == 'default') {
                disabled();

            } else {
                // mendapatkan value id
                let id = this.value;
                enabled();
                // memilih gallery
                $('#input_file').on("change", function(e) {
                    $("#btn-upload").removeAttr("disabled");
                    $("#btn-upload").removeClass("btn-secondary");
                    $("#btn-upload").addClass("btn-primary");
                    let file = this.files[0];
                    let fileSize = this.files[0].size;

                    // membaca inputan gambar
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                    $('#image-preview').show('slow');
                    if (fileSize > 2000000) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Ukuran Terlalu Besar !'
                        }).then(function() {
                            $('#input_file').val('')
                            $('#image-preview').hide();
                            $("#btn-upload").prop('disabled', true);
                            $("#btn-upload").removeClass(
                                "btn-primary");
                            $("#btn-upload").addClass(
                                "btn-secondary");
                        })

                    } else {
                        // handle upload image
                        let formData1 = new FormData();
                        formData1.set("image", file);
                        formData1.set("id", id);

                        $("#btn-upload").on("click", function() {
                            fetch('tambah.php', {
                                method: "POST",
                                body: formData1
                            }).then(response => {
                                return response.text();
                            }).then(responseText => {

                                function success() {
                                    Swal.fire({
                                        title: 'Berhasil',
                                        text: 'Data Berhasil Di Simpan !',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1000

                                    })

                                }
                                async function refresh() {
                                    let promise =
                                        await success()
                                    setTimeout(() => {
                                        $("#galleryModal")
                                            .modal(
                                                "hide");
                                        setTimeout(
                                            () => {
                                                location
                                                    .reload();
                                            }, 500);
                                    }, 1500);
                                }
                                refresh();
                            })
                        })
                    }

                })
            }

        })
        $("#cari").on("keyup", function() {
            let keyword = this.value;
            let formData = new FormData();
            formData.append("keyword", keyword);
            fetch('cari.php', {
                method: "POST",
                body: formData
            }).then(response => {
                return response.json();
            }).then(responseText => {
                let data = responseText
                console.log(data)
                let items = data.map(data => `
                    <tr id="${data.id}">
                        <td align="center">${data.title}</td>
                        <td align="center"><img src="../img/paket/${data.image}"style="width: 150px; height: 100px;">
                        </td>
                        <td align="center">
                            <button class="btn btn-sm btn-secondary btn-edit" data-toggle="modal" data-target="#galleryModal" data-id="${data.paket_travel_id}">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                            </button>

                            <button class="btn btn-sm btn-danger btn-delete" name="delete" type="submit">
                                    <i class="fas fa-trash-alt fa-2x"></i></a>
                            </button>



                            <div class="form-check-inline" style=" margin-top: 5px; position: absolute; margin-left: 5px;">
                                <input class="form-check-input myCheck" type="checkbox" value="${data.id}" data-id="${data.paket_travel_id}" data-image="${data.image}" name="checkbox[]" style="width: 25px; height: 25px;">
                            </div>
                        </td>
                    </tr>
                `)
                $("#bodyTabel").html(items)
                event();
            })
        })
    }
    </script>



</html>