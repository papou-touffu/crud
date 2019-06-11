<?php
session_start();

include_once 'form/htmlElements.php';
include_once 'form/connection.php';
include_once 'form/adminform.php';
include_once 'form/formtable.php';
include_once 'adminverif.php';



// Contenu afficher si l'utilasateur est connecté
function displayProtectedContent($db)
{

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

    // bouton de Logout et choix des tabless§
    echo '<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="?table=crud_home"><h3>HOME</h3></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?table=crud_presentation"><h3>PRESENTATION</h3></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?table=crud_service"><h3>SERVICES</h3></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?table=crud_portfolio"><h3>PORTFOLIO</h3></a>
  </li>
    <li class="nav-item">
     <a class="nav-link" href="?table=crud_competence"><h3>COMPETENCE</h3></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="?table=crud_contact"><h3>CONTACT</h3></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="?table=crud_image"><h3>IMAGE</h3></a>
  </li>
    <a class="nav-link" href="?logout=1" style="color: #ff0000"><h3>LOGOUT</h3></a>
  </li>
</ul>';
    $table = filter_input(INPUT_GET, "table", FILTER_SANITIZE_STRING);


// Si on clique sur le bouton competence
    if ($table == 'crud_competence') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);


// Affichage de la table
        $requestSelect = 'SELECT * FROM `crud_competence`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();
        formTableCompetence($lines);


// Insérer une compétence

        echo '<button type="button" class="btn btn-secondary"><a href="?table=crud_competence&action=insert">Insérer une donnée</a></button> <br>';
        if ($action == "insert") {
            formCompetence();
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
            if (!empty($nom)) {
                $request = "INSERT INTO `crud_competence`(`nom`) VALUES (:nom)";

                crudDb($db, $request, ['nom' => $_POST['nom']]);
                header('Location: admin.php?table=crud_competence');
            } else {
                echo "Insérer une valeur à chaque champ";
            }
        }
// Update une compétence
        if ($action== "update"){
            formCompetence2($db);
            $nom = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING);
            if (!empty($nom)) {
                $request= 'UPDATE `crud_competence` SET `nom` = :nom WHERE `id` = :id';
                crudDb($db,$request,['nom'=>$_POST['nom'],'id' => $_GET['id']]);

                header('Location: admin.php?table=crud_competence');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }
// Delete une compétence

        if ($action == "delete") {
            $request = 'DELETE FROM `crud_competence` WHERE `id` = :id';
            crudDb($db, $request, ['id' => $_GET['id']]);
            header('Location: admin.php?table=crud_competence');
        }

    }

//--------------------------------------------------------

// Si on clique sur le bouton service
    else if ($table == 'crud_service') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
// ajouter un service

        echo '<button type="button" class="btn btn-secondary"><a href="?table=crud_service&action=insert">Insérer une donnée</a></button> <br>';
        if ($action == "insert") {
            formService();
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);

            if (!empty($titre && $texte)) {

                $request = "INSERT INTO `crud_service`(`titre`,`texte`) VALUES (:titre,:texte)";

                crudDb($db, $request, ['titre' => $_POST['titre'], 'texte' => $_POST['texte']]);
                header('Location: admin.php?table=crud_service');

            } else {
                echo "Insérer une valeur à chaque champ";
            }
        }

        // read service

        $requestSelect = 'SELECT * FROM `crud_service`';
        $reponse = crudDb($db, $requestSelect);

        $lines = $reponse->fetchAll();


        formTableService($lines);
// Update service
        if ($action== "update"){
            formService2($lines);
            $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($titre && $texte)) {
                $request= 'UPDATE `crud_service` SET `titre` = :titre ,`texte` = :texte WHERE `id` = :id';
                crudDb($db,$request,['titre' => $_POST['titre'], 'texte' => $_POST['texte'], 'id' => $_GET['id']]);

                header('Location: admin.php?table=crud_service');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }
// Delete un service
        if ($action == "delete") {
            $request = 'DELETE FROM `crud_service` WHERE `id` = :id';
            crudDb($db, $request, ['id' => $_GET['id']]);
            header('Location: admin.php?table=crud_service');
        }


    }

// ------------------------------------
//présentation
   else if ($table == 'crud_presentation') {
       $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
       // Affichage de la table

       // ajouter
       echo '<button type="button" class="btn btn-secondary"><a href="?table=crud_presentation&action=insert">Insérer une donnée</a></button> <br>';
       if ($action == "insert") {
           formPresentation();
           $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
           $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
           if (!empty($titre && $texte)) {
               $request = "INSERT INTO `crud_presentation`(`titre`,`texte`) VALUES (:titre,:texte)";

               crudDb($db, $request, ['titre' => $_POST['titre'], 'texte' => $_POST['texte']]);
               header('Location: admin.php?table=crud_presentation');
           } else {
               echo "Insérer une valeur à chaque champ";
           }

       }
       // affichage de la presentation
       $requestSelect = 'SELECT * FROM `crud_presentation`';
       $reponse = crudDb($db, $requestSelect);
       $lines = $reponse->fetchAll();


       formTablePresentation($lines);
// Update presentation
       if ($action== "update"){
           formPresentation2($db);
           $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING);
           $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
           if (!empty($titre && $texte)) {
               $request= 'UPDATE `crud_presentation` SET `titre` = :titre , `texte` = :texte WHERE `id` = :id';
               crudDb($db,$request,['titre'=>$_POST['titre'],'texte'=>$_POST['texte'],'id' => $_GET['id']]);

               header('Location: admin.php?table=crud_presentation');
           }
           else{
               echo"Insérer une valeur à chaque champ";
           }

       }
// Delete presentation

       if ($action == "delete") {
           $request = 'DELETE FROM `crud_presentation` WHERE `id` = :id';
           crudDb($db, $request, ['id' => $_GET['id']]);
           header('Location: admin.php?table=crud_presentation');
       }
   }
//------------------------------------------------------------------------------------------------------------------------------

    // Si on clique sur le bouton Contact
    if ($table == 'crud_contact') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);


// Affichage de la table
        $requestSelect = 'SELECT * FROM `crud_contact`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();


        formTableContact($lines);


// Delete contact

        if ($action == "delete") {
            $request = 'DELETE FROM `crud_contact` WHERE `id` = :id';
            crudDb($db, $request, ['id' => $_GET['id']]);
            header('Location: admin.php?table=crud_contact');
        }

    }


    //---------------------------------------------------------------------------------------------------

    // Si on clique sur le bouton home
    if ($table == 'crud_home') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
// Insérer dans home

        echo '<button type="button" class="btn btn-secondary"><a href="?table=crud_home&action=insert">Insérer une donnée</a></button> <br>';
        if ($action == "insert") {
            formHome();
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($titre&& $texte)) {
                $request = "INSERT INTO `crud_home`(`titre`,`texte`) VALUES (:titre,:texte)";

                crudDb($db, $request, ['titre' => $_POST['titre'],'texte' => $_POST['texte']]);
                header('Location: admin.php?table=crud_home');
            } else {
                echo "Insérer une valeur à chaque champ";
            }

        }

// Affichage de la table
        $requestSelect = 'SELECT * FROM `crud_home`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();


        formTableHome($lines);

// Update home
        if ($action== "update"){
            formHome2($lines);
            $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($titre && $texte)) {
                $request= 'UPDATE `crud_home` SET `titre` = :titre ,`texte` = :texte WHERE `id` = :id';
                crudDb($db,$request,['titre' => $_POST['titre'], 'texte' => $_POST['texte'], 'id' => $_GET['id']]);

                header('Location: admin.php?table=crud_home');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }
// Delete home

        if ($action == "delete") {
            $request = 'DELETE FROM `crud_home` WHERE `id` = :id';
            crudDb($db, $request, ['id' => $_GET['id']]);
            header('Location: admin.php?table=crud_home');
        }

    }
//--------------------------------------------------------------------------------------------------------------------------------------
    if ($table == 'crud_portfolio') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
// Insérer dans portfolio

        echo '<button type="button" class="btn btn-secondary"><a href="?table=crud_portfolio&action=insert">Insérer une donnée</a></button> <br>';
        if ($action == "insert") {
            formPortfolio();
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($titre&& $texte)) {
                $request = "INSERT INTO `crud_portfolio`(`titre`,`texte`) VALUES (:titre,:texte)";

                crudDb($db, $request, ['titre' => $_POST['titre'],'texte' => $_POST['texte']]);
                header('Location: admin.php?table=crud_portfolio');
            } else {
                echo "Insérer une valeur à chaque champ";
            }

        }

// Affichage de la table portfolio
        $requestSelect = 'SELECT * FROM `crud_portfolio`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();


        formTablePortfolio($lines);

// Update portfolio
        if ($action== "update"){
            formPortfolio2($lines);
            $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($titre && $texte)) {
                $request= 'UPDATE `crud_portfolio` SET `titre` = :titre ,`texte` = :texte WHERE `id` = :id';
                crudDb($db,$request,['titre' => $_POST['titre'], 'texte' => $_POST['texte'], 'id' => $_GET['id']]);

                header('Location: admin.php?table=crud_portfolio');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }
// Delete portfolio

        if ($action == "delete") {
            $request = 'DELETE FROM `crud_portfolio` WHERE `id` = :id';
            crudDb($db, $request, ['id' => $_GET['id']]);
            header('Location: admin.php?table=crud_portfolio');
        }

    }



    //------------------------------------------------------------------------------------------------------------------------------
// Si on clique sur le bouton image
    else if ($table == 'crud_image') {
        $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_STRING);
// Insérer une image
        echo '<button type="button" class="btn btn-secondary"><a href="?table=crud_image&action=insert">Insérer une donnée</a></button> <br>';
        if ($action== "insert") {
            formImage();


            $nom_dossier = filter_input(INPUT_POST,"nom_dossier",FILTER_SANITIZE_STRING);
            $nom_fichier = filter_input(INPUT_POST,"nom_fichier",FILTER_SANITIZE_STRING);
            $extension = filter_input(INPUT_POST,"extension",FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST,"position",FILTER_SANITIZE_STRING);
            if (!empty($nom_dossier && $nom_fichier && $extension && $position )) {
                $fileSizeEnMega = 2;
                $maxFileSize = $fileSizeEnMega *1000000;
                $allowedExtensions = ['jpg'=>"image/jpeg",'jpeg'=>"image/jpeg",'png'=>"image/png",'gif'=>"image/gif"];
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
                    if ($_FILES['avatar']['size'] <= $maxFileSize){
                        $pathInfo = pathinfo($_FILES['avatar']['name']);

                        $extension2 = $pathInfo['extension'];
                        if (array_key_exists($extension2,$allowedExtensions) && mime_content_type($_FILES['avatar']['tmp_name']) == $allowedExtensions[$extension2] && $extension==$extension2){

                            $uploadedFilePath = './'.$nom_dossier.'/'.$nom_fichier.'.'.$extension2;
                            move_uploaded_file($_FILES['avatar']['tmp_name'],$uploadedFilePath);

                        }

                    }
                    else{
                        echo 'fichier trop gros';
                    }



                }
                if ($extension==$extension2) {
                    $request = "INSERT INTO `crud_image`(`nom_dossier`,`nom_fichier`,`extension`,`position`) VALUES (:nom_dossier,:nom_fichier,:extension,:position)";

                    crudDb($db, $request, ['nom_dossier' => $_POST['nom_dossier'], 'nom_fichier' => $_POST['nom_fichier'], 'extension' => $_POST['extension'], 'position' => $_POST['position']]);
                    header('Location: admin.php?table=crud_image');
                }
                else{
                    echo 'Extension différente';
                }

            }
            else{
                echo"Insérer une valeur à chaque champ";
            }
        }
        // affichage image
        $requestSelect='SELECT * FROM `crud_image`';
        $reponse=crudDb($db,$requestSelect);

        $lines = $reponse->fetchAll();



        formTableImage($lines);
// Update une image
        if ($action== "update" ){

            formImage2($db);
            $nom_dossier = filter_input(INPUT_POST,"nom_dossier",FILTER_SANITIZE_STRING);
            $nom_fichier = filter_input(INPUT_POST,"nom_fichier",FILTER_SANITIZE_STRING);
            $extension = filter_input(INPUT_POST,"extension",FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST,"position",FILTER_SANITIZE_STRING);
            if (!empty($nom_dossier && $nom_fichier && $extension && $position)) {

                $request="UPDATE `crud_image` SET `nom_dossier` = :nom_dossier , `nom_fichier` =  :nom_fichier, `extension` = :extension, `position` = :position WHERE `id` = :id";
                crudDb($db,$request,['nom_dossier'=>$_POST['nom_dossier'],'nom_fichier'=>$_POST['nom_fichier'],'extension'=>$_POST['extension'],'position'=>$_POST['position'],'id'=>$_GET['id']]);

                header('Location: admin.php?table=crud_image');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }
        }


// Delete une image
        if ($action== "delete") {
            $request= 'DELETE FROM `crud_image` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=crud_image');
        }

    }
}





//--------------------------------------------------------


//--------------------------------------------------------------------------------------------------------------------------------------





function crudDb(PDO $db, $request,$params =[])
{
    try {
        $reponse = $db->prepare($request);
        $reponse->execute($params);
    } catch (Exception $ex) {

    }
    return $reponse;
}
echo '
</body>
</html>';