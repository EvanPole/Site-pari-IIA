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


if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    
    $equipe = $bdd->prepare("SELECT * FROM match_pari WHERE id = ?");
    $equipe->execute(array($id));
    $equipeinfo = $equipe->fetch();
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
        <p>Equipe vainqueur</p>
    </div>
    <div class="conteineurpari">
        <div class="contleft">
            <p class="textparie"><a href="https://<?=$domaine?>/site/public/pari.php?id=<?=$id?>&typepari=0"
                    class="parier">Accéder au pari</a></p>
        </div>
    </div>
    <div class="pariinfo">
        <p>Pariez sur le Score exacte</p>
    </div>
    <div class="conteineurpari">
        <div class="contleft">
            <p class="textparie"><a href="https://<?=$domaine?>/site/public/pari.php?id=<?=$id?>&typepari=1"
                    class="parier">Accéder au pari</a></p>
        </div>
    </div>
    <div class="pariinfo">
        <p>Pariez sur un Buteur</p>
    </div>
    <div class="conteineurpari">
        <div class="contleft">
            <p class="textparie"><a href="https://<?=$domaine?>/site/public/pari.php?id=<?=$id?>&typepari=2"
                    class="parier">Accéder au pari</a></p>
        </div>
    </div>
    <div class="pariinfo">
        <p>Pariez sur le Score exacte + Buteur</p>
    </div>
    <div class="conteineurpari">
        <div class="contleft">
            <p class="textparie"><a href="https://<?=$domaine?>/site/public/pari.php?id=<?=$id?>&typepari=3"
                    class="parier">Accéder au pari</a></p>
        </div>
    </div>



</body>

</body>

</html>

<?php
 }else{
    require("./pari/pari_error.php");
 }
?>