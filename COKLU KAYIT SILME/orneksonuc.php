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
<?php 
function Filtrele($deger){
    $bir = trim($deger);
    $iki = strip_tags($bir);
    $uc  = htmlspecialchars($iki, ENT_QUOTES); 
    $sonuc = $uc;
    return $sonuc;
}

$gelensecimdegerleri = $_POST["secim"];
$IDleribirlestir     = implode(", ", $gelensecimdegerleri);
$IDler               = Filtrele($IDleribirlestir);
$sil = $db->prepare("DELETE FROM Kisiler WHERE id IN($IDler)");
$sil->execute();
header("location:ornekindex.php");
exit();

?>


</body>
</html>	