<?php


require("../../functions/functions.php");

$keyword = $_POST["keyword"];

$datas = query("SELECT * FROM transaksi WHERE id LIKE '%$keyword%' OR
                                            user_id LIKE '%$keyword%' OR
                                            status LIKE '%$keyword%' ");

echo json_encode($datas);