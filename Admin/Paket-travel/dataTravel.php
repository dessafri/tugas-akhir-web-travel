<?php

require("../../functions/functions.php");


$paket = query("SELECT * FROM paket_travel");
echo json_encode($paket);