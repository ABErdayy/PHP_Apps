<?php
require_once("baglan.php ");

function Filtrele($Deger){
    $Bir    =   trim($Deger);
    $Iki    =   strip_tags($Bir);
    $Uc     =   htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc  =   $Uc;
    return $Sonuc;
}

$GelenUstMenuSecimi      =   Filtrele($_POST["UstMenuSecimi"]);
$GelenMenuAdi            =   Filtrele($_POST["MenuAdi"]);


if (($GelenUstMenuSecimi != "") and ($GelenMenuAdi != "") ) {
        $Ekle                     =   $VeritabaniBaglantisi->prepare("INSERT INTO kategoriler (ustid, menuadi) values (?, ?)");
        $Ekle->execute([$GelenUstMenuSecimi, $GelenMenuAdi]);
        $EkleKontrolSayisi        =   $Ekle->rowCount();
        echo "<br />calisti<br />";

        if ($EkleKontrolSayisi>0) {
            header("Location:index.php");
            exit();
            
        }else{
            echo "Islem Sirasinda Beklenmeyen Bir Sorun Olustu! Daha Sonra Tekrar Deneyiniz. <br />";
            echo "Anasayfaya Donmek Icin <a href='index.php'> Buraya</a> Tiklayiniz.";
        }
}else {
    echo "Lutfen Bos Alan Birakmayiniz! <br />";
    echo "Anasayfaya Donmek Icin<a href='index.php'>Buraya</a> Tiklayiniz.";

}


$VeritabaniBaglantisi = null;
?>