<?php 

function flag($drapeau){
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'CriOS') !== false) {
        return;
}else{

    switch ($drapeau) {
        case 'France':
            echo'π«π·';
            break;
        case 'Tunisie':
            echo'πΉπ³';
            break;       
        case 'Pologne':
            echo'π΅π±';
            break;  
        case 'Mexique':
            echo'π²π½';
            break;
        case 'Argentine':
            echo'π¦π·';
            break;
        case 'Arabie saoudite':
            echo'πΈπ¦';
            break;       
        case 'Canada':
            echo'π¨π¦';
            break;  
        case 'Maroc':
            echo'π²π¦';
            break; 
        case 'Angleterre':
            echo'π¬π§';
            break;       
        case 'SΓ©nΓ©gal':
            echo'πΈπ³';
            break;  
        default:
            echo'π΄σ §σ ’σ ·σ ¬σ ³σ Ώ';
            break;
    }
}
}
?>