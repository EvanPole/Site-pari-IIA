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
    <link rel="stylesheet" href="../../asset/css/classement.css">

</head>

<body>

<?php
require("./navbar/nav.php");
?>
    <div class="conteineurclassement">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Classement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Membres</td>
                    <td>Points</td>
                </tr>
                <?php 
                    $listageuser = $bdd->query('SELECT * FROM users');
                    if($listageuser->rowCount() !== 0){
                        while($infouser = $listageuser->fetch()) {
                            $listageparis = $bdd->query('SELECT * FROM logs_pari WHERE user_id = '.$infouser['id'].'');
                            $calcwin = 0;
                            if($listageparis->rowCount() !== 0){
                                while($infowin = $listageparis->fetch()) { 
                                    $matchfind = $bdd->prepare('SELECT * FROM match_pari WHERE id = '.$infowin['pari_id'].'');
                                    $matchfind->execute(array(1));
                                    $match = $matchfind->fetch();
                                    // echo'[test debug classement de merde : '.$infowin['equipe_parier'].' - '.$match['win'].']';
                                    if($infowin['equipe_parier'] == $match['win']){
                                        $calcwin = $calcwin + 1;
                                    }
                                }
                            }else{
                                $calcwin = '0';
                            }
                            $updateclassement = $bdd->prepare("SELECT * FROM classement_user WHERE id_user = ?");
                            $updateclassement->execute(array($infouser['id']));
                            $classementfind = $updateclassement->rowCount();
                                if($classementfind == 0){
                                    $insertmbr = $bdd->prepare("INSERT INTO classement_user(points, nom_user, id_user) VALUES(?, ?, ?)");
                                    $insertmbr->execute(array($calcwin, $infouser['nom'], $infouser['id']));
                                }else{
                                    $insertmbr = $bdd->prepare("UPDATE classement_user SET points = ?, nom_user = ?  WHERE id_user = ?");
                                    $insertmbr->execute(array($calcwin, $infouser['nom'], $infouser['id']));
                                }
                        }
                        $listageclassement = $bdd->query('SELECT * FROM classement_user ORDER BY points DESC');
                        if($listageclassement->rowCount() !== 0) { 
                            while($infousers = $listageclassement->fetch()) { 
                                echo'<tr><td>'.$infousers["nom_user"].'</td><td>'.$infousers["points"].'</td></tr>';
                            }}else{}
                        
                    }else{
                        $calcwin = 'Il n\'y a pas de membres';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</body>

</html>