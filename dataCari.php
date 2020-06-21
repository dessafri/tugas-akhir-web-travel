<?php

require("functions/functions.php");

$keyword = $_POST["keyword"];

$data = query("SELECT DISTINCT MIN(image) image, paket_travel_id,title,location FROM paket_travel JOIN gallery ON gallery.paket_travel_id = paket_travel.id WHERE 
paket_travel.title LIKE '%$keyword%' OR 
paket_travel.location LIKE '%$keyword%'

GROUP BY paket_travel_id,title");

echo json_encode($data);