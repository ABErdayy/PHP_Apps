<?php 
try {
    $VeritabaniBaglantisi = new PDO("mysql:host=localhost;dbname=BizdenIzle;charset=UTF8", "root","root");
} catch (PDOException $hata) {
    echo $hata->getMessage();
    die();
}


function filtre($deger){
    $birinci = trim($deger);
    $iki     = strip_tags($birinci);
    $uc      = htmlspecialchars($iki, ENT_QUOTES);
    $sonuc   = $uc;
    return $sonuc;
}








?>