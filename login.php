<?php
require("./config/config_site.php");

if(isset($_POST['connect'])){
    if(!empty($_POST['nom']) && !empty($_POST['mdp'])){
        $infologin = $bdd->prepare("SELECT * FROM users WHERE nom = ".$bdd->quote($_POST['nom'])." AND mdp = ?");
        $mdp = sha1($_POST['mdp']);
        $infologin->execute(array( $mdp));
        $user = $infologin->rowCount();
        if($blocked == false){
            if($user == 1) {
                $userinfo = $infologin->fetch();
                $_SESSION['nom'] = $userinfo['nom'];
                $_SESSION['prenom'] = $userinfo['prenom'];
                $_SESSION['permission'] = $userinfo['permission'];
                $_SESSION['id'] = $userinfo['id'];
                if($userinfo['permission'] == "1"){

                    header("Location: site/public/overview.php");
                }else if($userinfo['permission'] == "8"){
                    
                    header("Location: site/admin/admin.php");
                }

            }else{
                $erreur = 'Mot de passe ou nom incorrect !';
            }
        }else{
            $erreur = 'Votre site est blocker !!';
        }
    }else{
            $erreur = 'Merci de remplir tous les champs';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login pari sportif</title>
    <link rel="stylesheet" href="/asset/css/login.css" class="css">
</head>


<body>
    <h1 id="logo">⚽ SPORT-STATS</h1>
    <form id="boxsizelogin" method="POST" action="">
        <input class="inputbox" type="text" name="nom" placeholder="Nom" />
        <input class="inputbox" type="password" name="mdp" placeholder="Mot de passe" />
        <input class="inputbutton connection" type="submit" name="connect" value="Se connecter ! ⚽" />
        <a class="inputbutton inscription" href="register.php" >S'inscrire 🏁</a>
        <?php if($erreur != null) : ?>
        <div id="error">Erreur :<?=$erreur?></div>
        <?php endif?>
    </form>
</body>

</html>