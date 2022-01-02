<?php
require_once("baglan.php ");


function Filtrele($Deger){
    $Bir    =   trim($Deger);
    $Iki    =   strip_tags($Bir);
    $Uc     =   htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc  =   $Uc;
    return $Sonuc;
}
$GelenID                 =   Filtrele($_GET["id"]);
$GelenUstMenuSecimi      =   Filtrele($_POST["UstMenuSecimi"]);
$GelenMenuAdi            =   Filtrele($_POST["MenuAdi"]);


if (($GelenID != "") and ($GelenUstMenuSecimi != "") and ($GelenMenuAdi != "") ) {
    $Guncelle                     =   $VeritabaniBaglantisi->prepare("UPDATE kategoriler SET ustid=?, menuadi=? WHERE id = ? LIMIT 1");
    $Guncelle->execute([$GelenUstMenuSecimi, $GelenMenuAdi, $GelenID]);
    $GuncelleKontrolSayisi        =   $Guncelle->rowCount();

    if ($GuncelleKontrolSayisi>0) {
        header("Location:index.php");
        exit();
        
    }else{
        echo "Islem Sirasinda Beklenmeyen Bir Sorun Olustu! Daha Sonra Tekrar Deneyiniz. <br />";
        echo "Anasayfaya Donmek Icin <a href='index.php'> Buraya</a> Tiklayiniz.";
    }
}else {
echo "Lutfen Bos Alan Birakmayiniz! <br />";
echo "Guncelleme Sayfasina Geri Donmek Icin<a href='guncelle.php?id=". $GelenID . "'>Buraya</a> Tiklayiniz.";

}



?>