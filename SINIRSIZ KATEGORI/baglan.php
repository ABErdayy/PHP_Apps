<?php 
    try {
        $VeritabaniBaglantisi   =   new PDO("mysql:host=localhost;dbname=BizdenIzle;charset=UTF8;", "root","root");
    } catch (PDOException $Hata) {
        echo $Hata->getMessage();
        die();
    }
?>
