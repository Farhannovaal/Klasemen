<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "pertandingan";


    $koneksi = mysqli_connect($server, $username, $password, $database) or die ("koneksi ke database gagal");


    define("BASE_URL", "http://localhost:8080/klasemenPertandingan/");

?>