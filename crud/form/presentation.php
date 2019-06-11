<?php

include_once 'form/connection.php';

function formPresentation($db)
{
    $requestPresentation = 'SELECT titre,texte from `crud_presentation`';
    $reponsePresentation = crudDb($db, $requestPresentation);
    $linesPresentation = $reponsePresentation->fetchAll();
    $content = '<ul>';

    foreach ($linesPresentation as $linePresentation){

        $content .= '<li  class="bloc1">'.$linePresentation['titre'].'</li>';
        $content .= '<li  class="bloc3">'.$linePresentation['texte'].'</li>';
    }
    $content .= '</ul>';



    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `crud_image` where position ="presentation" ';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetch();
    $image = $lineImage['nom_dossier'].'/'.$lineImage['nom_fichier'].$lineImage['extension'];


    $toREturn = '    <div class="wrapper">
    <section>
        
           '.$content.'
           
        
           <img class="img_presentation" src="'.$image.'"> 
        
        </section>
        </div>';


    return $toREturn;
}
