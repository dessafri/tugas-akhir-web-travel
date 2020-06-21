<?php
require("../../functions/functions.php");

$keyword = $_POST["keyword"];

$paket = query("SELECT * FROM paket_travel WHERE title LIKE '%" . $keyword . "%'");

echo json_encode($paket);