<?php

require("functions/functions.php");
$username = $_GET["username"];
$data = query("SELECT * FROM users WHERE username = '$username'");
if (empty($data)) {
    echo json_encode("error");
} else {
    echo json_encode("success");
}