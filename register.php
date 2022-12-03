<?php
require("./config/config_site.php");

if(isset($_POST['forminscription'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = sha1($_POST['mdp']);


    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp']) AND !empty($_POST['email'])) {
                $reqnom = $bdd->prepare("SELECT * FROM users WHERE nom = ?");
                $reqnom->execute(array($nom));
                $nomexist = $reqnom->rowCount();
                if($nomexist == 0) {
                      $insertmbr = $bdd->prepare("INSERT INTO users( id, nom, prenom, mdp, email) VALUES(?, ?, ?, ?, ?)");
                      $insertmbr->execute(array(rand(5484, 984121044), $nom, $prenom, $mdp, $email));
  
                      $erreur = "le membre a bien été ajouter !";
                      header("Location: https://".$domaine."");
                } else {
                   $erreur = "Le membre existe deja !";
                }
       } else {
          $erreur = "Merci de remplire tous les champ !";
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
        <input class="inputbox" type="text" name="prenom" placeholder="Prénom" />
        <input class="inputbox" type="email" name="email" placeholder="Email" />
        <input class="inputbox" type="password" name="mdp" placeholder="Mot de passe" />
        <input class="inputbutton connection" type="submit" name="forminscription" value="S'inscrire 🏁" />
        <?php if($erreur != null) : ?>
        <div id="error">Erreur :<?=$erreur?></div>
        <?php endif?>
    </form>
</body>

</html>