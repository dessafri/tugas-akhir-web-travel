<?php

require("../../functions/functions.php");

$about = $_POST["about"];
$destination = $_POST["destination"];
$fasilitas = $_POST["fasilitas"];

if (empty($about) == true or empty($destination) == true or empty($destination) == true) {
    echo json_encode("error");
} else {
    if (putDataTravel($_POST) > 0) {
        echo json_encode("success");
    }
}