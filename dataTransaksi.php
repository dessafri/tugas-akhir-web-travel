<?php

require("functions/functions.php");

$id = $_GET["id"];

$data = query("SELECT * FROM transaksi WHERE user_id='$id'");

echo json_encode($data);