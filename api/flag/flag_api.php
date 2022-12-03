<?php 

function flag($drapeau){
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'CriOS') !== false) {
        return;
}else{

    switch ($drapeau) {
        case 'France':
            echo'🇫🇷';
            break;
        case 'Tunisie':
            echo'🇹🇳';
            break;       
        case 'Pologne':
            echo'🇵🇱';
            break;  
        case 'Mexique':
            echo'🇲🇽';
            break;
        case 'Argentine':
            echo'🇦🇷';
            break;
        case 'Arabie saoudite':
            echo'🇸🇦';
            break;       
        case 'Canada':
            echo'🇨🇦';
            break;  
        case 'Maroc':
            echo'🇲🇦';
            break; 
        case 'Angleterre':
            echo'🇬🇧';
            break;       
        case 'Sénégal':
            echo'🇸🇳';
            break;  
        default:
            echo'🏴󠁧󠁢󠁷󠁬󠁳󠁿';
            break;
    }
}
}
?>