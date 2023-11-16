<?php

    $host = 'localhost';
    $user = 'root';
    $db = 'kefri_kefricok_accred_NC';
    $password = '';

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die('Connection failed!' . $conn->connect_error);
    }
?>
