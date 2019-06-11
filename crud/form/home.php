<?php

include_once 'form/connection.php';

function formHome($db)
{
    $requestHome = 'SELECT titre,texte from `crud_home`';
    $reponseHome = crudDb($db, $requestHome);
    $lineHome = $reponseHome->fetch();

    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `crud_image` where position ="home" ';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetch();
    $image = $lineImage['nom_dossier'].'/'.$lineImage['nom_fichier'].$lineImage['extension'];


    $toREturn = '    <div class="wrapper">
    <section>
        <div>
            <h2 class="name-index">'.$lineHome['titre'].'</h2>
            <p class="job-index">'.$lineHome['texte'].'</p>
        </div>
        <div>
           <img class="img_home" src="'.$image.'"> 
        </div>
        </section>
        </div>';


return $toREturn;
    }
