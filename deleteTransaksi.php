<?php

require("functions/functions.php");

$id = $_POST["checkbox"];
$id = explode(",", $id);

deleteTransaksi($id);