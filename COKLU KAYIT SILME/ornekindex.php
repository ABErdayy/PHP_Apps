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
    <form action="orneksonuc.php" method="POST">
        <table width="500" align="center" border="0" cellpadding="0" cellspacing="0" >
            <?php
            $sorgu = $db->prepare("SELECT*FROM Kisiler");
            $sorgu->execute();

            $kayitsayisi = $sorgu->rowCount();
            $kayitlar    = $sorgu->fetchAll(PDO::FETCH_ASSOC);

            foreach ($kayitlar as $kayitsatirlari) {
            ?>
            <tr>
                <td width="25" height="30" align="left"><input type="checkbox" name="secim[]" value="<?php echo $kayitsatirlari["id"]; ?>"></td>
                <td  height="30" align="left"><?php echo $kayitsatirlari["adi"] . " " . $kayitsatirlari["soyadi"]; ?></td>
            </tr>

            <?php 
            }
            ?>
            <tr>
                <td colspan="2" align="left" height="50"><input type="submit" value="Secilileri sil"></td>
            </tr>

        </table>
    </form>

</body>
</html>	