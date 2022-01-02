<?php 
session_start();
if (empty($_SESSION["sitedili"])) {
    include("diltr.php");
}else {
    if ($_SESSION["sitedili"] == "Turkish") {
        include("diltr.php");
    }else {
        include("dilen.php");
    }
}

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
	<table  width="1000" align="center" border="0">
        <tr height="40">
            <td><?php echo ANASAYFA;?></td>
            <td><?php echo HAKKIMIZDA;?></td>
            <td><?php echo ILETISIM;?></td>
            <td><?php echo URUNLER;?></td>
            <td><?php echo PORTFOLYO;?></td>
            <td><a href="secim.php?Dilsecimi=Turkish" style="color: #000000; text-decoration: none;">TR</a> | <a href="secim.php?Dilsecimi=English" style="color: #000000; text-decoration: none;">EN </a> </td>
        </tr>
    </table>
</body>
</html>	