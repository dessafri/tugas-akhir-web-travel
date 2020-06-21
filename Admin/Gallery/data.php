<?php

require("../../functions/functions.php");


$datas = query("SELECT * FROM paket_travel as p LEFT JOIN gallery as g ON g.paket_travel_id = p.id WHERE image IS NOT null");

echo json_encode($datas);