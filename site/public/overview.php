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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport-stats</title>
    <link rel="stylesheet" href="../../asset/css/overview.css">

</head>

<body>

<?php
require("./navbar/nav.php");
?>
<div class="textmainheadvenir">
    <p>Match a venir</p>
</div>
    <?php 
         $listagematch = $bdd->query('SELECT * FROM match_pari');
         
         if($listagematch->rowCount() !== 0){
            while($infomatch = $listagematch->fetch()) { 
                if($infomatch['date_pari'] > date('Y-m-d H-i-s')){
    ?>
    <div class="conteineurpari">
        <div class="contleft">
            <p class="cpdm">Coupe du monde 🌍</p>
            <p class="match"><?=$infomatch['equipe1']?> <?=flag($infomatch['equipe1'])?> -
                <?=flag($infomatch['equipe2'])?> <?=$infomatch['equipe2']?></p>
        </div>
        <div class="contright">
            <p class="heur"><?=$infomatch['date_pari']?></p>
            <?php  if($infomatch['date_pari'] < date('Y-m-d H-i-s')){
                    if($infomatch['win'] == '1'){
                        echo'<a class="resultat">'.$infomatch['equipe1'].'</a>';
                    }else if($infomatch['win'] == '2') {
                        echo'<a class="resultat">'.$infomatch['equipe2'].'</a>';
                    }else if($infomatch['win'] == '0') {
                        echo'<a class="resultat">Nul</a>';
                    }
                }else{

                    echo'<a href="https://'.$domaine.'/site/public/pari/pari_condition.php?id='.$infomatch['id'].'"class="parier">Parier</a>';
                }
                ?>
        </div>
    </div>
    <?php
            }}
        }else{
            $calcwin = 'Il n\'y a pas de match enregistrer';
        }
    ?>
<div class="textmainhead">
    <p>Match Terminer</p>
</div>
<?php 
         $listagematch = $bdd->query('SELECT * FROM match_pari');
         
         if($listagematch->rowCount() !== 0){
            while($infomatch = $listagematch->fetch()) { 
                if($infomatch['date_pari'] < date('Y-m-d H-i-s')){
    ?>
    <div class="conteineurpari">
        <div class="contleft">
            <p class="cpdm">Coupe du monde 🌍</p>
            <p class="match"><?=$infomatch['equipe1']?> <?=flag($infomatch['equipe1'])?> -
                <?=flag($infomatch['equipe2'])?> <?=$infomatch['equipe2']?></p>
        </div>
        <div class="contright">
            <p class="heur"><?=$infomatch['date_pari']?></p>
            <?php  if($infomatch['date_pari'] < date('Y-m-d H-i-s')){
                    if($infomatch['win'] == '1'){
                        echo'<a class="resultat">'.$infomatch['equipe1'].'</a>';
                    }else if($infomatch['win'] == '2') {
                        echo'<a class="resultat">'.$infomatch['equipe2'].'</a>';
                    }else if($infomatch['win'] == '0') {
                        echo'<a class="resultat">Nul</a>';
                    }
                }else{

                    echo'<a href="https://'.$domaine.'/site/public/pari/pari_condition.php?id='.$infomatch['id'].'"class="parier">Parier</a>';
                }
                ?>
        </div>
    </div>
    <?php
            }}
        }else{
            $calcwin = 'Il n\'y a pas de match enregistrer';
        }
    ?>

</body>

</body>

</html>