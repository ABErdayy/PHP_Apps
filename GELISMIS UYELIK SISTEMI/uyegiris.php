<?php 
require_once("baglan.php");

    if (isset($_POST["KullaniciAdi"])) {
        $GelenKullaniciAdi  =   Filtre($_POST["KullaniciAdi"]);
    }else {
        $GelenKullaniciAdi = "";
    }

    if (isset($_POST["Sifre"])) {
        $GelenSifre  =   Filtre($_POST["Sifre"]);
    }else {
        $GelenSifre = "";
    }

$KontrolSorgusu     =   $VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE kullaniciadi=? AND sifre=?");
$KontrolSorgusu->execute([$GelenKullaniciAdi,$GelenSifre]);
$KontrolSayisi      =   $KontrolSorgusu->rowCount();


if ($KontrolSayisi>0) {
    $_SESSION["Kullanici"]  =   $GelenKullaniciAdi;
    header("Location:index.php");
}else {
    echo "HATA! <br />";
    echo "Girilen Bilgiler Ile Eslesem Kulanici Kaydi Bulunmamaktadir.<br />";
    echo "Anasayfaya Donmek Icin Lutfen <a href='index.php'>Buraya</a> Tiklayiniz";
}




?>