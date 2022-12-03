<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5 ; url=https://<?=$domaine?>/site/public/overview.php">
    <title>Sport-stats</title>
    <link rel="stylesheet" href="../../../asset/css/pari.css">
</head>

<?php
require("./navbar/nav.php");
?>

<?php 
$info_text = $_GET['info_error'];
if(isset($_GET['info_error'])){
    $info_error = [
        "Vous avez du vous tromper de paris ou le paris n'existe plus !",
        "🎉 Votre paris viens d'etre enregistrer ! 🎉",
        "Vous avez deja fais un paris sur le match !"
    ];
}else{
    $info_text = 0;
    $info_error = [
        "Erreur"
    ];
}

?>

<body>
    <div class="conteineurpari">
        <p class="infoerror"><?=$info_error[$info_text];?></p>
    </div>
</body>



</html>