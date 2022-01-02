<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=BizdenIzle;charset=utf8;", "root","root");
} catch (PDOException $error) {
    echo " hata kodu : " . $error->getMessage();
    die();
    
}

?>
