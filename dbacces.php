<?php

    define('HOST','localhost');
    define('DB_NAME','fkilic_01');
    define('USER','fkilic');
    define('PASS','ilyasfatihkylian');

    try{
        $db = new PDO('mysql:host=' . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<script>alert('connection établie')</script>";
    } catch(PDOException $e){
        echo $e;
    }
?>