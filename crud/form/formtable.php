<?php

include_once 'form/connection.php';
include_once 'form/adminform.php';
echo '<!doctype html>
    <html lang="en">
     <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CoreUI CSS -->
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">

        <title>ADMIN VERIF</title>
    </head>
    <body class="#" style="font-family: Permanent Marker, cursive; background: #BEF574;">';
/// function qui mette en forme les tableaux lorsque l'on clique sur une table

function formTableCompetence($lines){
    echo '<table class="table table-hover table-dark">';
    echo '<thead>';
    echo '<td scope="col">id</td>';
    echo '<td scope="col">nom</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td scope="col">'.$line['id'].'</td>';
        echo '<td scope="col">'.$line['nom'].'</td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_competence&action=update&id='.$line['id'].'">Update</a></button></td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_competence&action=delete&id='.$line['id'].'">Delete</a></button></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';

}

function formTableService($lines){
    echo '<table class="table table-hover table-dark">';
    echo '<thead>';
    echo '<td scope="col">id</td>';
    echo '<td scope="col">titre</td>';
    echo '<td scope="col">texte</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td scope="col">'.$line['id'].'</td>';
        echo '<td scope="col">'.$line['titre'].'</td>';
        echo '<td scope="col">'.$line['texte'].'</td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_service&action=update&id='.$line['id'].'">Update</a></button></td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_service&action=delete&id='.$line['id'].'">Delete</a></button></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}

function formTablePresentation($lines){
    echo '<table class="table table-hover table-dark">';
    echo '<thead>';
    echo '<td scope="col">id</td>';
    echo '<td scope="col">titre</td>';
    echo '<td scope="col">texte</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td scope="col">'.$line['id'].'</td>';
        echo '<td scope="col">'.$line['titre'].'</td>';
        echo '<td scope="col">'.$line['texte'].'</td>';

        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_presentation&action=update&id='.$line['id'].'">Update</a></button></td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_presentation&action=delete&id='.$line['id'].'">Delete</a></button></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}

function formTableImage($lines){
    echo '<table class="table table-hover table-dark">';
    echo '<thead>';
    echo '<td scope="col">id</td>';
    echo '<td scope="col">Nom dossier</td>';
    echo '<td scope="col">Nom fichier</td>';
    echo '<td scope="col">extension</td>';
    echo '<td scope="col">position</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td scope="col">'.$line['id'].'</td>';
        echo '<td scope="col">'.$line['nom_dossier'].'</td>';
        echo '<td scope="col">'.$line['nom_fichier'].'</td>';
        echo '<td scope="col">'.$line['extension'].'</td>';
        echo '<td scope="col">'.$line['position'].'</td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_image&action=update&id='.$line['id'].'">Update</a></button></td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_image&action=delete&id='.$line['id'].'">Delete</a></button></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}

function formTableContact($lines){
    echo '<table class="table table-hover table-dark">';
    echo '<thead>';
    echo '<td scope="col">id</td>';
    echo '<td scope="col">nom</td>';
    echo '<td scope="col">email</td>';
    echo '<td scope="col">message</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td scope="col">'.$line['id'].'</td>';
        echo '<td scope="col">'.$line['nom'].'</td>';
        echo '<td scope="col">'.$line['email'].'</td>';
        echo '<td scope="col">'.$line['message'].'</td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_contact&action=delete&id='.$line['id'].'">Delete</a></button></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}

function formTableHome($lines){
    echo '<table class="table table-hover table-dark">';
    echo '<thead>';
    echo '<td scope="col">id</td>';
    echo '<td scope="col">titre</td>';
    echo '<td scope="col">texte</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td scope="col">'.$line['id'].'</td>';
        echo '<td scope="col">'.$line['titre'].'</td>';
        echo '<td scope="col">'.$line['texte'].'</td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_home&action=update&id='.$line['id'].'">Update</a></button></td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_home&action=delete&id='.$line['id'].'">Delete</a></button></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
function formTablePortfolio($lines){
    echo '<table class="table table-hover table-dark">';
    echo '<thead>';
    echo '<td scope="col">id</td>';
    echo '<td scope="col">titre</td>';
    echo '<td scope="col">texte</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td scope="col">'.$line['id'].'</td>';
        echo '<td scope="col">'.$line['titre'].'</td>';
        echo '<td scope="col">'.$line['texte'].'</td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_portfolio&action=update&id='.$line['id'].'">Update</a></button></td>';
        echo '<td scope="col"><button type="button" class="btn btn-pill btn-warning"><a href="?table=crud_portfolio&action=delete&id='.$line['id'].'">Delete</a></button></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}




echo '</body>
</html>';
