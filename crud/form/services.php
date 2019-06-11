<?php

include_once 'form/connection.php';

function formService($db)
{
    $requestServices = 'SELECT titre,texte from `crud_service`';
    $reponseServices = crudDb($db, $requestServices);
    $lineServices = $reponseServices->fetch();

    $requestCompetences = 'SELECT nom from `crud_competence`';
    $reponseCompetences = crudDb($db, $requestCompetences);

    $linesCompetences = $reponseCompetences->fetchAll();
    $content = '<ul>';

    foreach ($linesCompetences as $lineCompetences){

        $content .= '<li class="title-services2">'.$lineCompetences['nom'].'</li>';

    }
    $content .= '</ul>';
    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `crud_image` where position ="services" ';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetch();
    $image = $lineImage['nom_dossier'].'/'.$lineImage['nom_fichier'].$lineImage['extension'];


    $toREturn = '    <div class="wrapper">
    <section>
        <div>
            <h2 class="title-services">'.$lineServices['titre'].'</h2>
            <p class="title-services2">'.$lineServices['texte'].'</p>
        </div>
        <p>'.$content.'</p>
</div>
        <div>
           <img class= src="'.$image.'"> 
        </div>
        </section>
        </div>';


    return $toREturn;
}
