<?php

require("functions/functions.php");

storeKeranjang($_POST);
echo json_encode("sukses");