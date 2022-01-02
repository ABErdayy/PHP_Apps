<?php 
session_start(); ob_start();

try {
    $VeritabaniBaglantisi       =       new PDO("mysql:host=localhost;dbname=scheduler 1.0;charset=UTF8;","root","");
} catch (PDOException $hata) {
    echo $hata->getMessage();
    die();
}       
function Filtre($deger){
    $bir    =   trim($deger);
    $iki    =   strip_tags($bir);
    $uc     =   htmlspecialchars($iki, ENT_QUOTES);
    $sonuc  =   $uc;
    return $sonuc;
}
$ZamanDamgasi = time();

if(isset($_SESSION["Kullanici"])){
    $UyelerSorgusu          =   $VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE kullaniciadi=?");
    $UyelerSorgusu->execute([$_SESSION["Kullanici"]]);
    $UyelerKayitSayisi      =   $UyelerSorgusu->rowCount();
    $UyelerKaydi            =   $UyelerSorgusu->fetch(PDO::FETCH_ASSOC);

    if ($UyelerKayitSayisi>0) {
        $UyeninAdiSoyadi    =   $UyelerKaydi["adisoyadi"];
    }else {
        $UyeninAdiSoyadi    =   "";
    }


}
?>