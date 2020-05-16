<?php
    // hostname or ip of server
    $server_name='localhost';
    // username and password
    $db_username='root';
    $db_password='';
    $link = mysqli_connect($server_name, $db_username, $db_password)
    or die ( " Not able to connect to server ");
    if ($link)
    {
        echo "ok....koneksi berhasil";
    }
?> 