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
    <title>Document</title>
    <link rel="stylesheet" href="../../../asset/css/profil.css">

</head>

<body>

    <?php
require("../navbar/nav.php");
?>
    <div id="boxsizeprofiltitleline">
        <p>Profil</p>
    </div>
    <div id="boxsizeprofil">
        <input class="inputbox" type="text" name="com" placeholder="Nom" />
        <input class="inputbox" type="text" name="prenom" placeholder="Prénom" />
        <input class="inputbox" type="email" name="emails" placeholder="Email" />
        <input class="inputbox" type="password" name="mdps" placeholder="Mot de passe" />
        <input class="inputbutton" type="submit" name="connect" value="Enregistrer !" />
    </div>
</body>

</body>

</html>