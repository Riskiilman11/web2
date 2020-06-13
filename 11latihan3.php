<?php
    $con = mysqli_connect("localhost","root","");
    mysqli_select_db($con, "lat_dbase");
    
    //membuat tabel
    $sql = "CREATE TABLE tbl_mhs
    (
    mhsID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(mhsID), 
    FirstName varchar(15),
    LastName varchar(15),
    Age int
    )";
    $create = mysqli_query($con, $sql) or die ("Tidak Dapat Membuat Tabel");
    if(!mysqli_error($create)){
        echo "Tabel Berhasil dibuat";
    }
    // input data
    $input = mysqli_query($con, "insert into tbl_mhs(FirstName,LastName,Age)
    values('Anjar','Prabowo',25)")  or die ("Tidak Dapat Input Data ke Tabel");
    if(!mysqli_error($input)){
        echo "Tabel Berhasil dibuat";
    }

?> 