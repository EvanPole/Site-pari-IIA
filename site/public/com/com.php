<?php 
require("../../../config/config_site.php");
require("../../../api/login/verif.php");
require("../../../api/flag/flag_api.php");
///////////////////////////
// Page Config perm      //
///////////////////////////
$perminfo = $userinfo['permission'];
$permlvl = "0";
permission($perminfo,$permlvl);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport-stats</title>
    <link rel="stylesheet" href="../../../asset/css/pari.css">

</head>

<body>

    <?php
require("../navbar/nav.php");
?>

    <div class="pariinfo">
        <p>Derniers paris</p>
    </div>

    <div class="conteineurpari">
        <div class="contleft">
            <p class="cpdm">Pari de Evan Suire</p>
            <p class="textparie"> <span style="color:green;">France</span> - Pologne</p>
            <p class="textparie"> <a href="#"><span style="color: #ffcc00;">Commenter</span></a></p>
        </div>

    </div>
    <div class="conteineurpari">
        <div class="contleft">
            <p class="cpdm">Pari de Mahieux</p>
            <p class="textparie"> <span style="color:green;">France</span> - Pologne</p>
            <p class="textparie"> <a href="#"><span style="color: #ffcc00;">Commenter</span></a></p>
        </div>
    </div>
</body>

</body>

</html>