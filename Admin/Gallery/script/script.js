function close() {
    $('select').val("default")
    $('#image-preview').hide();
    $('#input_file').val('')
    $("input[type='file']").attr("disabled", 'disabled');
    $("#btn-upload-gambar").prop('disabled', true);
    $("#btn-upload-gambar").removeClass("btn-primary");
    $("#btn-upload-gambar").addClass("btn-secondary");
    $("#image-after").hide();
}

function disabled() {
    $("input[type='file']").attr("disabled", 'disabled');
    $("#btn-upload-gambar").prop('disabled', true);
    $("#btn-upload-gambar").removeClass("btn-primary");
    $("#btn-upload-gambar").addClass("btn-secondary");
}

function enabled() {
    $("input[type='file']").removeAttr("disabled");
}
// // ketika modal di close
$('#galleryModal').on('hide.bs.modal', function () {
    close();
})
$("#btn-edit").click(function (e) {
    e.preventDefault();
})
// mengubah perilaku dari link
$('#tambah').click(function (e) {
    $("#spanTitle").hide();
    $("#modalLabel").html("Tambah Gallery");
    $('select').removeAttr("disabled");
    e.preventDefault();
})
// preview image hide
$('#image-preview').hide();
// set input file disable
disabled();
$('#paket_travel_id').change(function () {
    // cek apakah value default
    if (this.value == 'default') {
        disabled();

    } else {
        // mendapatkan value id
        let id = this.value;
        enabled();
        // memilih gallery
        $('#input_file').change(function (e) {
            $("#btn-upload-gambar").removeAttr("disabled");
            $("#btn-upload-gambar").removeClass("btn-secondary");
            $("#btn-upload-gambar").addClass("btn-primary");
            let file = this.files[0];
            let fileSize = this.files[0].size;

            // membaca inputan gambar
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
            $('#image-preview').show('slow');
            if (fileSize > 2000000) {
                Swal.fire({
                    icon: 'error',
                    text: 'Ukuran Terlalu Besar !'
                }).then(function () {
                    $('#input_file').val('')
                    $('#image-preview').hide();
                    $("#btn-upload-gambar").prop('disabled', true);
                    $("#btn-upload-gambar").removeClass(
                        "btn-primary");
                    $("#btn-upload-gambar").addClass(
                        "btn-secondary");
                })

            } else {
                // handle upload image
                let formData = new FormData();
                formData.append("image", file);
                formData.append("id", id);

                // upload gambar
                $('#btn-upload-gambar').click(function () {
                    fetch('tambah.php', {
                        method: "POST",
                        body: formData
                    }).then(response => {
                        return response.text();
                    }).then(responseText => {

                        console.log(file)
                        console.log("sukses")

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
$(".btn-edit").attr("disabled", true)
$('.myCheck').change(function () {
    let data = [];
    $(':checkbox:checked').each(function (i) {
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

function Delete(e) {
    console.log("delete")

    e.preventDefault()

}
$(btnDelete).click(function (e) {
    console.log("delete")
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
            $(":checkbox:checked").each(function (i) {
                id[i] = $(this).val();
                console.log(id)
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
                }).then(function () {
                    const xhr = new XMLHttpRequest();

                    xhr.onload = function () {
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
                                            function () {
                                                $(this)
                                                    .remove();
                                            });
                                }
                                resolve("sukses");
                            })
                        }
                        async function deleted() {
                            let changeData =
                                await animation();
                            $('#delete').html(this
                                .responseText);
                        }
                        deleted();
                        // console.log(xhr.responseText)
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
$(".btn-edit").click(function (e) {
    $('select').attr("disabled", "disabled")
    let valueCheckbox = []
    let dataImage;
    $(':checkbox:checked').each(function (i) {
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
        $("#btn-upload-gambar").attr("id", "btn-edit-gambar")

        $("#input_file").change(function () {
            $("#btn-edit-gambar").removeAttr("disabled");
            $("#btn-edit-gambar").removeClass("btn-secondary");
            $("#btn-edit-gambar").addClass("btn-primary");
            // membaca inputan gambar
            let file = this.files[0];
            let fileSize = this.files[0].size;
            let reader = new FileReader();
            reader.onload = function (e) {
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
                }).then(function () {
                    $('#input_file').val('')
                    $('#image-preview').hide();
                    $("#btn-upload-gambar").prop('disabled', true);
                    $("#btn-upload-gambar").removeClass(
                        "btn-primary");
                    $("#btn-upload-gambar").addClass(
                        "btn-secondary");
                })

            } else {
                // handle upload image
                let idtravel = valueCheckbox.toString();
                let formData = new FormData();
                formData.set("image", file);
                formData.append("id", idtravel);

                // upload gambar
                $('#btn-edit-gambar').click(function () {
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
$("#cari").on("keyup", function () {
    let keyword = this.value;
    let formData = new FormData();
    formData.append("keyword", keyword);
    fetch('cari.php', {
        method: "POST",
        body: formData
    }).then(response => {
        return response.json();
    }).then(responseText => {
        console.log(responseText)
    })
})