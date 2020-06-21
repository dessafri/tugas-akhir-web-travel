<?php

require("../../functions/functions.php");
$id = $_GET["id"];
$data = query("SELECT * FROM paket_travel WHERE id='$id'");

echo json_encode($data);