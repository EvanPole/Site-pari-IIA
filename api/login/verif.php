<?php 

    if(isset($_SESSION['id'])) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $requser->execute(array($_SESSION['id']));
        $userinfo = $requser->fetch();
    }else{
        header("Location: https://".$domaine."/login.php");
    }

function permission($perminfo,$permlvl){
    if($perminfo >= $permlvl){
        }else{
            header("Location: https://".$domaine."/login.php");
        }
    }
?>