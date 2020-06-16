<?php

// koneksi 

use function PHPSTORM_META\map;

$conn = mysqli_connect("localhost", "root", "", "fajar_tour_db");

if (!$conn) {
    mysqli_error($conn);
}



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };

    return $rows;
}

function deletePaketTravel($id)
{
    global $conn;

    mysqli_query($conn, "DELETE  FROM paket_travel WHERE id='$id'");

    return mysqli_affected_rows($conn);
}


function putDataTravel($data)
{
    global $conn;

    $title = htmlspecialchars($data["title"]);
    $location = htmlspecialchars($data["location"]);
    $about = htmlspecialchars($data["about"]);
    $keberangkatan = "Requested";
    $duration = htmlspecialchars($data["duration"]);
    $orang = htmlspecialchars($data["orang"]);
    $destination = htmlspecialchars($data["destination"]);
    $fasilitas = htmlspecialchars($data["fasilitas"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO paket_travel VALUES ('','$title','$location','$about','$keberangkatan','$duration','$orang','$destination','$fasilitas','$harga')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateDataTravel($data)
{
    global $conn;
    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $location = htmlspecialchars($data["location"]);
    $about = htmlspecialchars($data["about"]);
    $keberangkatan = "Requested";
    $duration = htmlspecialchars($data["duration"]);
    $orang = htmlspecialchars($data["orang"]);
    $destination = htmlspecialchars($data["destination"]);
    $fasilitas = htmlspecialchars($data["fasilitas"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = " UPDATE paket_travel SET 
                        title = '$title',
                        location = '$location',
                        about = '$about',
                        keberangkatan = 'Requested',
                        duration = '$duration',
                        orang = '$orang',
                        duration = '$duration',
                        destination = '$destination',
                        fasilitas = '$fasilitas',
                        harga = '$harga'

                        WHERE id='$id'
    ";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function register($data)
{
    global $conn;

    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $re_password = $data["re-password"];
    $usernameDb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM users"));
    $emailDb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM users"));

    // var_dump($emailDb);

    if ($email == $emailDb["email"]) {
        echo
            "<script>
        alert('email sudah tersedia')
        </script>";

        return false;
    } else if ($username == $usernameDb["username"]) {
        echo
            "<script>
        alert('Username sudah tersedia')
        </script>";

        return false;
    } else if ($password != $re_password) {
        echo
            "<script>
        alert('Konfirmasi Password tidak cocok !!')
        </script>";

        return false;
    } else {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users VALUES('','','$username','$email','','','','$password')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }




    // echo "<script>
    // console.log('sukses')
    // </script>";
}

function login($data)
{
    global $conn;

    $username = $data["username"];
    $password = $data["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            header("location: index.php");
            exit;
        }
    }

    $error = true;

    if (isset($error)) {
        echo "
        <script>
        alert('Username / Password Tidak Cocok !!')
        
        </script>
        ";
    }
}

function updateGambarTravel($data, $gambar)
{
    global $conn;

    $id_travel = $data["id"];
    $namaFile = $gambar["image"]["name"];
    $tmpName = $gambar["image"]["tmp_name"];

    $ekstensiFile = explode(".", $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));


    $namafileBaru = uniqid();
    $namafileBaru .= ".";
    $namafileBaru .= $ekstensiFile;

    // var_dump($id_travel);
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image  FROM gallery WHERE id='$id_travel'"));
    $result = $result["image"];

    var_dump($namaFile);

    mysqli_query($conn, "UPDATE gallery SET 
                                        image='$namafileBaru'

                                        WHERE id='$id_travel'
                                        ");
    move_uploaded_file($tmpName, "../img/paket/" . $namafileBaru);
    unlink("../img/paket/" . $result);


    return mysqli_affected_rows($conn);
}
function uploadGambarTravel($data, $gambar)
{
    global $conn;

    $id_travel = $data["id"];
    $namaFile = $gambar["image"]["name"];
    $tmpName = $gambar["image"]["tmp_name"];
    $ekstensiFile = explode(".", $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));


    $namafileBaru = uniqid();
    $namafileBaru .= ".";
    $namafileBaru .= $ekstensiFile;

    // var_dump($id_travel);


    mysqli_query($conn, "INSERT INTO gallery VALUES('','$id_travel','$namafileBaru')");
    move_uploaded_file($tmpName, "../img/paket/" . $namafileBaru);

    return mysqli_affected_rows($conn);
}
function deleteGalleryTravel($id)
{
    global $conn;

    $data = $id;

    foreach ($data as $id_data) {

        var_dump($id_data);

        $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image  FROM gallery WHERE id='$id_data'"));
        $result = $result["image"];
        unlink("../img/paket/" . $result);
        mysqli_query($conn, "DELETE  FROM gallery WHERE id='$id_data'");
    }

    // return mysqli_affected_rows($conn);
}

function updateTransaksi($data)
{
    global $conn;
    $id = $data["id"];
    $status = $data["status_transaksi"];

    $query = " UPDATE transaksi SET 
                        status = '$status'
                        WHERE id='$id'
    ";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}