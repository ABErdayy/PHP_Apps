<?php
require_once("denemebaglan.php");
?>
<!doctype html>
<html lang="tr-TR">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-H4EJFFZB2B"></script>
<script data-ad-client="ca-pub-8423985051843587" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-H4EJFFZB2B');
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="tr">
<meta charset="utf-8">
<title>Sizin icin yenileniyoruz!</title>
<body>
    <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center" > 
        <tr height="30">
            <td align="left"><b>Goruntuleme ve Hit Uygulamasi</b></td>
            <td align="right"><a href="denemeindex.php" style="text-decoration: none; color: black;">Anasayfa</a></td>
        </tr>
        <tr height="30">
            <td colspan="2"></td>
        </tr>
        <tr height="30"bgcolor="990000" style="color: white;">
            <td align="left">&nbsp;Makale basligi</td>
            <td align="right">Gosterim Sayisi&nbsp;</td>
        </tr>

    <?php 
    $sorgu          = $db->prepare("SELECT*FROM makalaler");
    $sorgu->execute();
    $kayitsayisi    =   $sorgu->rowCount();
    $kayitlar       =   $sorgu->fetchAll(PDO::FETCH_ASSOC);
    if ($kayitsayisi>0) {
        foreach ($kayitlar as $satirlar) {
    ?>
    <tr height="30"">
        <td align="left" >&nbsp;<a href="denemeoku.php?id=<?php echo $satirlar['id'] ?>"style="color: black; text-decoration: none;"><?php echo $satirlar["makalebasligi"] ?></a></td>
        <td align="right">&nbsp;<a><?php echo $satirlar["gosterimsayisi"] ?></a></td>
    </tr>





    <?php
            }
        }
        
        
    ?>


</table>
</body>
</html>
<?php 
$db = null;
?>