<?php


require("../../functions/functions.php");

$datas = query("SELECT * FROM transaksi");

echo json_encode($datas);