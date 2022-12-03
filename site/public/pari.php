<?php 
require("../../config/config_site.php");
require("../../api/login/verif.php");
require("../../api/flag/flag_api.php");
///////////////////////////
// Page Config perm      //
///////////////////////////
$perminfo = $userinfo['permission'];
$permlvl = "0";
permission($perminfo,$permlvl);
if(isset($_GET['id']) && isset($_GET['equipewin']) ){
    $eqw = htmlspecialchars($_GET['equipewin']);
    if($eqw == 1 || 2 || 3){
        $nodoubleparis = $bdd->prepare("SELECT * FROM logs_pari WHERE user_id = ? AND pari_id = ?");
        $nodoubleparis->execute(array($_SESSION['id'],$_GET['id']));
        $iddouble = $nodoubleparis->rowCount();
    if($iddouble == 0){
        header("Location: https://".$domaine."/site/public/pari.php?info_error=1");
        $registerparis = $bdd->prepare('INSERT INTO logs_pari(user_id,equipe_parier,pari_id) VALUES(?,?,?)');
        $registerparis->execute(array($_SESSION['id'],$eqw,$_GET['id']));
    }else{
        header("Location: https://".$domaine."/site/public/pari.php?info_error=2");
    }
}else{
    header("Location: https://".$domaine."/site/public/pari.php?info_error=2");
}
}else{
if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $type = htmlspecialchars($_GET['typepari']);
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
    <title>Document</title>
    <link rel="stylesheet" href="../../asset/css/pari.css">

</head>

<body>

    <?php
require("./navbar/nav.php");
?>

    <div class="conteineurpari">
        <div class="contleft">
            <?php 
            if($type == 1){?>
            <p class="info">Score exacte</p>
            <p class="info"> <input class="but" min="0" max="20" type="number"> - <input class="but" min="0" max="20"
                    type="number"> </p>

            <?php
            }
            if($type == 2){?>
            <p class="info"> Numero du buteur</p>
            <p class="info"> <input class="but" min="0" max="20" type="number"> </p>

            <?php
            }
            if($type == 3){?>
            <p class="info">Score exacte + buteur</p>
            <p class="info"> <input class="but" min="0" max="20" type="number"> - <input class="but" min="0" max="20"
                    type="number"> </p>

            <p class="info"> Numero du buteur</p>
            <p class="info"> <input class="but" min="0" max="20" type="number"> </p>
            <?php
                }
            ?>
            <p class="info">Merci de choisir l'équipe sur qui vous voudriez parier </p>
            <p class="textparie"><a href="https://<?=$domaine?>/site/public/pari.php?id=<?=$id?>&equipewin=1"
                    class="parier"><?=$equipeinfo['equipe1']?></a> - <a
                    href="https://<?=$domaine?>/site/public/pari.php?id=<?=$id?>&equipewin=2"
                    class="parier"><?=$equipeinfo['equipe2']?></a></p>

        </div>
    </div>

</body>

</body>

</html>

<?php
 }else{
    require("./pari/pari_error.php");
 }
}
?>