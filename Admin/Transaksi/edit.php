<?php

require("../../functions/functions.php");
if (updateTransaksi($_POST) > 0) {
    echo "sukses";
}
