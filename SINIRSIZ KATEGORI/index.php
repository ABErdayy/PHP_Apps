<?php
require_once("baglan.php ");
?>
<!doctype html>
<html lang="tr-TR">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="tr">
<meta charset="utf-8">
<title>baslik</title>
</head>
<body>
	<?php

    function AcilirListeIcinMenuYaz($MenuUstIdDegeri=0, $BoslukDegeri=0){
        global $VeritabaniBaglantisi;
        $MenuSorgusu            =   $VeritabaniBaglantisi->prepare("SELECT * FROM kategoriler WHERE ustid = ?");
        $MenuSorgusu->execute([$MenuUstIdDegeri]);
        $MenuSorgusuSayi        =   $MenuSorgusu->rowCount();
        $MenuSorgusuKayitlari   =   $MenuSorgusu->fetchAll(PDO::FETCH_ASSOC);

        if ($MenuSorgusuSayi>0) {
            foreach ($MenuSorgusuKayitlari as $Kayitlar) {
                $MenuId         =   $Kayitlar["id"];
                $MenuUstId      =   $Kayitlar["ustid"];
                $MenuAdi        =   $Kayitlar["menuadi"];

                echo "<option value='" . $MenuId . "'>" . str_repeat("&nbsp;", $BoslukDegeri) . $MenuAdi . "</option>";
                
                
                echo str_repeat("&nbsp;", $BoslukDegeri) . $MenuAdi . "<a href='guncelle.php?id=" . $MenuId . "'>[Guncelle]</a>" . "<a href='sil.php?id=". $MenuId ."'>[Sil]</a> <br />"; 
                AcilirListeIcinMenuYaz($MenuId, $BoslukDegeri+5);

            }
        }
    }




    function MenuYaz($MenuUstIdDegeri=0, $BoslukDegeri=0){
        global $VeritabaniBaglantisi;
        $MenuSorgusu            =   $VeritabaniBaglantisi->prepare("SELECT * FROM kategoriler WHERE ustid = ?");
        $MenuSorgusu->execute([$MenuUstIdDegeri]);
        $MenuSorgusuSayi        =   $MenuSorgusu->rowCount();
        $MenuSorgusuKayitlari   =   $MenuSorgusu->fetchAll(PDO::FETCH_ASSOC);

        if ($MenuSorgusuSayi>0) {
            foreach ($MenuSorgusuKayitlari as $Kayitlar) {
                $MenuId         =   $Kayitlar["id"];
                $MenuUstId      =   $Kayitlar["ustid"];
                $MenuAdi        =   $Kayitlar["menuadi"];

                echo str_repeat("&nbsp;", $BoslukDegeri). $MenuAdi . "<a href='guncelle.php?id=" . $MenuId . "'>[Guncelle]</a>" . "<a href='sil.php?id=". $MenuId ."'>[Sil]</a> <br />"; 
                MenuYaz($MenuId, $BoslukDegeri+10);

            }
        }
    }
    //Yeni Menu Ekleme
?>
    Menu Ekleme Formu <br />
    <form action="ekle.php" method="POST">
        Ust Menu :  <select name="UstMenuSecimi">
            <option value="0">Ana Menu Ekle</option>
            <?php AcilirListeIcinMenuYaz(); ?>

        </select><br />
        Menu Adi : <input type="text" name="MenuAdi"> <br />
        <input type="submit" value="Menu Ekle">
    </form> <br /><br /><br /><br />


<?php
    //Menuleri Listeleme
    MenuYaz();
	?>




</body>
</html>	
