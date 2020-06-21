<?php

require("functions/functions.php");

updatePassword($_POST);

echo json_encode("sukses");