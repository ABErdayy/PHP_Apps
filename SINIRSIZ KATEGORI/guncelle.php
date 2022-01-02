<?php
require_once("baglan.php ");


function Filtrele($Deger){
    $Bir    =   trim($Deger);
    $Iki    =   strip_tags($Bir);
    $Uc     =   htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc  =   $Uc;
    return $Sonuc;
}

$GelenID      =   Filtrele($_GET["id"]);
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
    function AcilirListeIcinMenuYaz($GuncellenecekMenuId,$GuncellenecekMenuUstId, $MenuUstIdDegeri=0, $BoslukDegeri=0){
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

                if ($GuncellenecekMenuId != $MenuId) {
                        if ($GuncellenecekMenuUstId==$MenuId) {
                            echo "<option value='" . $MenuId . "' selected='selected'>" . str_repeat("&nbsp;", $BoslukDegeri) . $MenuAdi . "</option>";
        
                        }else {
                            echo "<option value='" . $MenuId . "'>" . str_repeat("&nbsp;", $BoslukDegeri) . $MenuAdi . "</option>";
        
                        }                    
                    AcilirListeIcinMenuYaz($GuncellenecekMenuId,$GuncellenecekMenuUstId,$MenuId, $BoslukDegeri+5);
                }
            }
        }
    }
    $Sorgu            =   $VeritabaniBaglantisi->prepare("SELECT * FROM kategoriler WHERE id = ? LIMIT 1");
    $Sorgu->execute([$GelenID]);
    $SorguSayi        =   $Sorgu->rowCount();
    $SorguKayit       =   $Sorgu->fetch(PDO::FETCH_ASSOC);
    // Menu Guncelle 
?>
    Menu Guncelleme Formu <br />
    <form action="guncellesonuc.php?id=<?php echo $SorguKayit["id"];?>" method="POST" >
        Ust Menu :  <select name="UstMenuSecimi">
            <option value="0" <?php if($SorguKayit["ustid"] == 0){ ?>selected='selected'<?php } ?>>Ana Menu</option>
            <?php AcilirListeIcinMenuYaz($SorguKayit["id"], $SorguKayit["ustid"]); ?>
        </select><br />
        Menu Adi : <input type="text" name="MenuAdi" value="<?php echo $SorguKayit["menuadi"];?>"> <br />
        <input type="submit" value="Menu Guncelle">

<?php 
$VeritabaniBaglantisi = null;
?>
</body>
</html>	
