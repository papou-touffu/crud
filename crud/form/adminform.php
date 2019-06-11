<?php
echo '<!doctype html>
    <html lang="en">
     <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CoreUI CSS -->
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css%22%3E

        <title>ADMIN</title>
    </head>
    <body class="# style="font-family: Permanent Marker, cursive; background: #BEF574;">';
// affichage de la page home
function formHome(){
    echo '<form method="post" action="">';

    echo'<div class="form-group">';
    echo '<label for="titre">Titre</label>';
    echo '<input type="text" class="form-control"placeholder="Titre"  name="titre">';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="texte">Texte</label>';
    echo '<input type="text"class="form-control"placeholder="Texte" name="texte">';
    echo'</div>';

    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
}
function formHome2($lines){
    foreach ($lines as $line){
        echo '<form method="post" action="">';
        echo '<label for="titre">Titre :</label>';
        echo '<input type="text" value="'.$line['titre'].'" name="titre" >';
        echo '<label for="texte">Texte :</label>';
        echo '<input type="text" value="'.$line['texte'].'" name="texte" >';
        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
    }
}
// Affichage des champs pour les compétences
function formCompetence(){
    echo '<form method="post" action="">';

    echo'<div class="form-group">';
    echo '<label for="nom">Nom</label>';
    echo '<input type="text" class="form-control"placeholder="nom" name="nom">';
    echo'</div>';

    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
}
function formCompetence2($db){
    $id = $_GET['id'];
    $request="SELECT * FROM `crud_competence` WHERE `id` = $id";
    $reponse=crudDb($db,$request);
    $lines = $reponse->fetchAll();

    foreach ($lines as $line){
        echo '<form method="post" action"">';

        echo '<div class="form-group">';
        echo '<label for="nom">Nom</label>';
        echo '<input type="text" name="nom" value="'.$line['nom'].'" class="form-control">';
        echo '</div>';

        echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

        echo '</form>';
    }
}

// Affichage des champs pour les services proposés
function formService(){
    echo '<form method="post" action="">';

    echo'<div class="form-group">';
    echo '<label for="titre">titre</label>';
    echo '<input type="text" class="form-control"placeholder="titre" name="titre">';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="texte">texte</label>';
    echo '<input type="text" class="form-control"placeholder="texte" name="texte">';
    echo'</div>';

    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
}

function formService2($lines){
    foreach ($lines as $line){
        echo '<form method="post" action="">';
        echo '<label for="titre">Titre :</label>';
        echo '<input type="text" value="'.$line['titre'].'" name="titre" >';
        echo '<label for="texte">Texte :</label>';
        echo '<input type="text" value="'.$line['texte'].'" name="texte" >';
        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
    }
}
// Affichage des champs pour la presentation
function formPresentation(){
    echo '<form method="post" action="">';

    echo'<div class="form-group">';
    echo '<label for="titre">titre </label>';
    echo '<input type="text" class="form-control"placeholder="titre" name="titre">';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="texte">texte</label>';
    echo '<input type="text" class="form-control"placeholder="texte" name="texte">';
    echo'</div>';

    echo '<button type="submit">Envoyer</button>';
    echo '</form>';

}

function formPresentation2($db){
    $id = $_GET['id'];
    $request="SELECT * FROM `crud_presentation` WHERE `id` = $id";
    $reponse=crudDb($db,$request);
    $lines = $reponse->fetchAll();

    foreach ($lines as $line){
        echo '<form method="post" action"">';

        echo '<div class="form-group">';
        echo '<label for="titre">titre</label>';
        echo '<input type="text" name="titre" value="'.$line['titre'].'" class="form-control">';
        echo '<label for="texte">texte</label>';
        echo '<input type="text" name="texte" value="'.$line['texte'].'" class="form-control">';
        echo '</div>';

        echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

        echo '</form>';
    }
}
// Affichage des champs pour les images
function formImage(){
    echo '<form method="post" action="" enctype="multipart/form-data">';

    echo'<div class="form-group">';
    echo '<label for="nom_dossier">Nom dossier </label>';
    echo '<input type="text" class="form-control"placeholder="nom du dossier" name="nom_dossier" required>';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="nom_fichier">Nom fichier</label>';
    echo '<input type="text" class="form-control"placeholder="nom du fichier" name="nom_fichier" required>';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="extension">extension</label>';
    echo '<input type="text" class="form-control"placeholder="extension de la photo" name="extension" required>';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="position">position</label>';
    echo '<input type="text" class="form-control"placeholder="page ou l on souhaite placer l image" name="position" required>';
    echo'</div>';

    echo'<label for="avatar">Joindre fichier</label>';
    echo '<input type="file" name="avatar" id="avatar" required>';

    echo '<button type="submit">Envoyer</button>';
    echo '</form>';

}function formImage2($db){
    $id = $_GET['id'];
    $request="SELECT * FROM `crud_image` WHERE `id` = $id";
    $reponse=crudDb($db,$request);
    $lines = $reponse->fetchAll();

    foreach ($lines as $line){
        echo '<form method="post" action"">';

        echo '<div class="form-group">';
        echo '<label for="nom_dossier">Nom de dossier</label>';
        echo '<input type="text" name="nom_dossier" value="'.$line['nom_dossier'].'" class="form-control">';
        echo '<label for="nom_fichier">Nom du fichier</label>';
        echo '<input type="text" name="nom_fichier" value="'.$line['nom_fichier'].'" class="form-control">';
        echo '<label for="extension">extension du fichier</label>';
        echo '<input type="text" name="extension" value="'.$line['extension'].'" class="form-control">';
        echo '<label for="position">position sur le site</label>';
        echo '<input type="text" name="position" value="'.$line['position'].'" class="form-control">';
        echo '</div>';

        echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

        echo '</form>';
    }
}
// Affichage des champs pour les contacts
function formContact(){
    echo '<form method="post" action="">';

    echo'<div class="form-group">';
    echo '<label for="nom">nom</label>';
    echo '<input type="text" class="form-control"placeholder="nom" name="nom">';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="email">email</label>';
    echo '<input type="text" class="form-control"placeholder="adresse email" name="email">';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="message">message</label>';
    echo '<input type="text" class="form-control"placeholder="message" name="message">';
    echo'</div>';

    echo '<button type="submit">Envoyer</button>';
    echo '</form>';

}
// Affichage du portfolio
function formPortfolio(){
    echo '<form method="post" action="">';

    echo'<div class="form-group">';
    echo '<label for="titre">Titre</label>';
    echo '<input type="text" class="form-control"placeholder="titre" name="titre">';
    echo'</div>';

    echo'<div class="form-group">';
    echo '<label for="texte">Texte</label>';
    echo '<input type="text"  class="form-control"placeholder="texte" name="texte">';
    echo'</div>';

    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
}
function formPortfolio2($lines){
    foreach ($lines as $line){
        echo '<form method="post" action="">';
        echo '<label for="titre">Titre :</label>';
        echo '<input type="text" value="'.$line['titre'].'" name="titre" >';
        echo '<label for="texte">Texte :</label>';
        echo '<input type="text" value="'.$line['texte'].'" name="texte" >';
        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
    }
}


echo '</body>
</html>';