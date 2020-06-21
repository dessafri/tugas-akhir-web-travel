<?php

require("functions/functions.php");

$id = $_GET["id"];

$data = query("SELECT * FROM paket_travel as p LEFT JOIN gallery as g ON g.paket_travel_id = p.id WHERE p.id = $id");

echo json_encode($data);