<?php
require("../../config/config_site.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport-stats admin</title>
    <link rel="stylesheet" href="../../asset/css/admin.css" class="css">
</head>


<body>
    <h1 id="logo">Pannel d'administration</h1>
    <form id="boxsizelogin" method="POST" action="">
        <div class="textinfo">Ajouter un match</div>
        <input class="inputbox" type="text" name="eq1" placeholder="equipe1" />
        <input class="inputbox" type="text" name="eq2" placeholder="equipe2" />
        <input class="inputbox" type="datetime-local" name="date" placeholder="date" />
        <div class="textinfo">Bloquer un utilisateur</div>
        <input class="inputbox" type="text" name="id" placeholder="id" />

    </form>
</body>

</html>