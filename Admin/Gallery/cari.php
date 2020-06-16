<?php
require("../../functions/functions.php");

$keyword = $_POST["keyword"];

$paket = query("SELECT * FROM paket_travel as p LEFT JOIN gallery as g ON g.paket_travel_id = p.id WHERE p.title LIKE '%$keyword%'");

echo json_encode($paket);