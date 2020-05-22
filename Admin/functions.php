<?php

// koneksi 

$conn = mysqli_connect("localhost", "root", "", "fajar_tour_db");

if(!$conn){
    mysqli_error($conn);
}