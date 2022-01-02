<?php 
require_once("baglan.php");
 if(isset($_SESSION["Kullanici"])){
    header("Location:index.php");
    exit();
 }else {

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
    <table width="1000" height="600" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="5" height="100" bgcolor="#cccccc">UST ALAN(HEADER)(LOGO - BANNER - MENULER VS)</td>
        </tr>
            <tr>
                <td colspan="5" height="20" >&nbsp;</td>
            </tr>
            
                <tr>
                <td width="200" valign="top" height="400"bgcolor="#cccccc"><a href='index.php'style="text-decoration : none; color : black">Ana Sayfa</a></td>
                    <td width="10" height="400">&nbsp;</td>
                    <td width="480" height="400" bgcolor="#cccccc">MAIN ALANI(ICERIK ALANI)</td>
                    <td width="10" height="400">&nbsp;</td>
                    <td width="300" height="400" valign="top">
                        
                            <form action="uyeolsonuc.php" method="POST">
                                <table width="300" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td colspan="3" height="30" bgcolor="#990000" style="color: honeydew;">&nbsp;Yeni Uye Kayit Alani</td>
                                    </tr>
                                    <tr>
                                        <td height="30" width="100" >&nbsp;Kullanici Adi</td>
                                        <td height="30" width="10">:</td>
                                        <td height="30" width="190"><input type="text" name="KullaniciAdi" style="width: 97%;"></td>
                                    </tr>
                                    <tr>
                                        <td height="30" width="100" >&nbsp;Sifre</td>
                                        <td height="30" width="10">:</td>
                                        <td height="30" width="190"><input type="password" name="Sifre" style="width: 97%;"></td>
                                    </tr>
                                    <tr>
                                        <td height="30" width="100" >&nbsp;Adi Soyadi</td>
                                        <td height="30" width="10">:</td>
                                        <td height="30" width="190"><input type="text" name="AdSoyad" style="width: 97%;"></td>
                                    </tr>
                                    <tr>
                                        <td height="30" width="100" >&nbsp;E-Mail Adresi</td>
                                        <td height="30" width="10">:</td>
                                        <td height="30" width="190"><input type="email" name="EmailAdresi" style="width: 97%;"></td>
                                    </tr>
                                    <tr>
                                        <td height="30" width="100" >&nbsp;</td>
                                        <td height="30" width="10">&nbsp;</td>
                                        <td height="30" width="190" align="right"><input type="submit" value="Kayit Ol" ></td>
                                    </tr>
                                </table>
                            </form>
                    </td>
                </tr>
            <tr>
                <td colspan="5" height="20" >&nbsp;</td>
            </tr>
        <tr>
            <td colspan="5" height="100" bgcolor="#cccccc">ALT ALAN (FOOTER ALANI) (LOGO - BANNER - MENULER VS.)</td>
        </tr>

    </table>

</body>
</html>	
<?php 
}
$VeritabaniBaglantisi = null;
?>