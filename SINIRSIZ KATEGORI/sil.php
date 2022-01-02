<?php
require_once("baglan.php ");

$GelenID      =   Filtrele($_GET["id"]);
function Filtrele($Deger){
    $Bir    =   trim($Deger);
    $Iki    =   strip_tags($Bir);
    $Uc     =   htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc  =   $Uc;
    return $Sonuc;
}

$MenuHiyerarsisiBulDizisi     =   array($GelenID);

function MenuHiyerarsisiBul ($MenuIdDegeri){
    global $VeritabaniBaglantisi;
    global $MenuHiyerarsisiBulDizisi;
    
    $MenuSorgusu            =   $VeritabaniBaglantisi->prepare("SELECT * FROM kategoriler WHERE ustid = ?");
    $MenuSorgusu->execute([$MenuIdDegeri]);
    $MenuSorgusuSayi        =   $MenuSorgusu->rowCount();
    $MenuSorgusuKayitlari   =   $MenuSorgusu->fetchAll(PDO::FETCH_ASSOC);

    if ($MenuSorgusuSayi>0) {
        foreach ($MenuSorgusuKayitlari as $Kayitlar) {
            $MenuId         =   $Kayitlar["id"];
            $MenuUstId      =   $Kayitlar["ustid"];
            $MenuAdi        =   $Kayitlar["menuadi"];            
            $MenuHiyerarsisiBulDizisi[]     =   $MenuId;
            MenuHiyerarsisiBul($MenuId);
        }
    }
    return $MenuHiyerarsisiBulDizisi;
}



if (isset($GelenID)) {
    $SilinecekMenuler       =   MenuHiyerarsisiBul($GelenID);

        foreach ($SilinecekMenuler as $Silinecekler) {
            $Sil                     =   $VeritabaniBaglantisi->prepare("DELETE FROM kategoriler WHERE id=? LIMIT 1");
            $Sil->execute([$Silinecekler]);
            $SilKontrolSayisi        =   $Sil->rowCount();
            if ($SilKontrolSayisi<1) {
                echo "HATA<br />";
                echo "Islem Sirasinda Beklenmeyen Bir Sorun Olustu. Daha Sonra Tekrar Deneyiniz.<br />";
                echo "Ana Sayfaya Geri Donmek Icin Lutfen Buraya <a href='index.php'>Tiklayiniz</a>.";
            }
        }
        header("Location:index.php");
        exit();

    }else{
            echo "Islem Sirasinda Beklenmeyen Bir Sorun Olustu! Daha Sonra Tekrar Deneyiniz. <br />";
            echo "Anasayfaya Donmek Icin <a href='index.php'> Buraya</a> Tiklayiniz.";
        
}


$VeritabaniBaglantisi = null;
?>