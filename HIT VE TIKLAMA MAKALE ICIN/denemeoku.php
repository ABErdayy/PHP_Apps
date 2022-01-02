<?php
require_once("denemebaglan.php");

$gelenid = filtre($_GET["id"]);
$hitguncelle = $db->prepare("UPDATE makalaler SET gosterimsayisi=gosterimsayisi+1  WHERE id = ?");
$hitguncelle->execute([$gelenid]);
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
        <?php 
    $sorgu          = $db->prepare("SELECT*FROM makalaler WHERE id = ?");
    $sorgu->execute([$gelenid]);
    $kayitsayisi    =   $sorgu->rowCount();
    $kayit       =   $sorgu->fetch(PDO::FETCH_ASSOC);
    
    if ($kayitsayisi>0) {
        ?>
        <tr height="30">
            <td colspan="2" align="left"><h3><?php echo $kayit["makalebasligi"] . "<br />"; ?></h3></td>
        </tr>

        <tr height="30">
            <td colspan="2" align="left"><?php echo $kayit["makaleicerigi"] ; ?></td>
        </tr>
        <tr height="30">
            <td colspan="2" align="center">Bu makale <?php echo $kayit["gosterimsayisi"]; ?> defa goruntulendi.</td>
        </tr>    
<?php
    }else {
        header("location:denemeindex.php");
    }
    ?>


</table>



</body>
</html>
<?php 
$db = null;
?>