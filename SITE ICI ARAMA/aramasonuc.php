<?php 
require_once("baglan.php");
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
    <br /><br /><br /><br />
    <form action="aramasonuc.php" method="POST">
    <table width="500px" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td><input type="text" name="kelime" style="width: 100%; height: 30px; margin-bottom: 20px; padding: 0 20px;"></td>
        </tr>

        <tr>
            <td align="center"><input type="submit" value="Arama Yap" style=" width: fit-content; padding: 0 100px; height: 30px;"></td>
        </tr>
    </table>
</form>
<?php
$gelenkelime = filtre($_POST["kelime"]);

$sorgu       = $VeritabaniBaglantisi->prepare("SELECT * FROM esyalar WHERE adi LIKE ?");
$sorgu->execute(["%$gelenkelime%"]);
$kayitsayisi =  $sorgu->rowCount();
$kayitlar    =  $sorgu->fetchAll(PDO::FETCH_ASSOC);

echo "bulunan kayitlar <br />";
foreach ($kayitlar as $satirlar) {
    echo $satirlar["adi"] . "<br />";
}

?>


</body>
</html>	
<?php
$VeritabaniBaglantisi = null;
?>