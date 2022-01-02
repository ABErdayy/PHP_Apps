<?php 
require_once("baglan.php");

        if (isset($_POST["KullaniciAdi"])) {
            $GelenKullaniciAdi  =   Filtre($_POST["KullaniciAdi"]);
        }else {
            $GelenKullaniciAdi  = "";
        }

        if (isset($_POST["Sifre"])) {
            $GelenSifre  =   Filtre($_POST["Sifre"]);
        }else {
            $GelenSifre  = "";
        }
        if (isset($_POST["AdSoyad"])) {
            $GelenAdSoyad  =   Filtre($_POST["AdSoyad"]);
        }else {
            $GelenAdSoyad  = "";
        }
        if (isset($_POST["EmailAdresi"])) {
            $GelenEmailAdresi  =   Filtre($_POST["EmailAdresi"]);
        }else {
            $GelenEmailAdresi  = "";
        }

    $KontrolSorgusu     =   $VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE kullaniciadi=? OR emailadresi=?");
    $KontrolSorgusu->execute([$GelenKullaniciAdi,$GelenEmailAdresi]);
    $KontrolSayisi      =   $KontrolSorgusu->rowCount();
        if ($KontrolSayisi>0) {
            echo "Hata!<br />";
            echo "Kullanici Adi Veya Email Adresi Baska Bir Uye Tarafindan Kullanilmaktadir<br />";
            echo "Anasayfaya Donmek Icin Lutfen <a href='index.php'>Buraya</a> Tiklayiniz";
        }else {
                $KayitEkle  =   $VeritabaniBaglantisi->prepare("INSERT INTO uyeler (kullaniciadi, sifre, adisoyadi, emailadresi,kayittarihi) values (?, ?, ?, ?, ?) ");
                $KayitEkle->execute([$GelenKullaniciAdi, $GelenSifre, $GelenAdSoyad, $GelenEmailAdresi, $ZamanDamgasi]);
                $KayitKontrol = $KayitEkle->rowCount();
                
                    if ($KayitKontrol>0) {
                        echo "TEBRIKLER! <br />";
                        echo "Kullanici Kaydi Basariyla Tamamlandi.<br />";
                        echo "Anasayfaya Donmek Icin Lutfen <a href='index.php'>Buraya</a> Tiklayiniz";
                    }else {
                        echo "Hata! <br />";
                        echo "Kullanici Kaydi Sirasinda Bir Hata Olustu.<br />";
                        echo "Lutfen Daha Sonra Tekrar Deneyiniz.<br />";
                        echo "Anasayfaya Donmek Icin Lutfen <a href='index.php'>Buraya</a> Tiklayiniz";
                    }
            }
?>