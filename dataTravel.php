<?php

require("functions/functions.php");

$data = query("SELECT DISTINCT MIN(image) image, paket_travel_id,title,location FROM paket_travel JOIN gallery ON gallery.paket_travel_id = paket_travel.id GROUP BY paket_travel_id,title");

echo json_encode($data);