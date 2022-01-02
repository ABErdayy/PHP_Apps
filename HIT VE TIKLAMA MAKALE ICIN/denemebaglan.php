<?php 

try {
    $db = new PDO ("mysql:host=localhost;dbname=BizdenIzle;charset=utf8;","root","root");
} catch (PDOException $error) {
    $error->getMessage();
    die();
}
function filtre($deger){
    $bir    =   trim($deger);
    $iki    =   strip_tags($bir);
    $uc     =   htmlspecialchars($iki, ENT_QUOTES);
    $sonuc  =   $uc;
    return $sonuc;
}
?>