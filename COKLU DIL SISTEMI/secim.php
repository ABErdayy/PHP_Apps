<?php
    session_start();
    $gelendilsecimi     =   $_GET["Dilsecimi"];
    $_SESSION["sitedili"]   =   $gelendilsecimi;

    header("Location:index.php");
    exit();




?>