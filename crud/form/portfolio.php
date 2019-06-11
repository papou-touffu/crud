<?php

include_once 'form/connection.php';
function formPortfolio($db){

    $requestPortfolio= 'SELECT titre,texte from `crud_portfolio`';
    $reponsePortfolio=  crudDb($db, $requestPortfolio);

    $linesPortfolio = $reponsePortfolio->fetchAll();
    $content = '<ul>';
    foreach ($linesPortfolio as $linePortfolio){

        $content .= '<li>'.$linePortfolio['titre'].'</li>';
        $content .= '<li>'.$linePortfolio['texte'].'</li>';
    }
    $content .= '</ul>';
   // $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `crud_image` where position ="portfolio" ';
    //$reponseImage=crudDb($db,$requestImage);
   // $linesImage=$reponseImage->fetchAll();

    //foreach ($linesImage as $lineImage){

      //  $image = $lineImage['nom_dossier'].'/'.$lineImage['nom_fichier'].$lineImage['extension'];

    //}

    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `crud_image` where position ="portfolio" ';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetchAll();

    $j=0;
// concaténation du content
    $image = '';

    for($i=0;$i<count($lineImage);$i++){

        $image .='<img class="border-img" src="';
        $image .= $lineImage[$i]['nom_dossier'].'/'.$lineImage[$i]['nom_fichier'].$lineImage[$i]['extension'];
        $image .= '" alt="#" width="350px" height="350px"> ';
        $image .='</div>';
        $j++;
        if ($j%3==0 ){
            $image .='<div class="clear"></div>';

        }

    }
    $toREturn= '
    
    
        
            '.$content.'
            <br>
         '.$image.'
        
        
    ';

    return $toREturn;

}