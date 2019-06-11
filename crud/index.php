<?php


include_once 'form/connection.php';
include_once 'form/htmlElements.php';
include_once 'form/home.php';
include_once 'form/presentation.php';
include_once 'form/portfolio.php';
include_once 'form/services.php';
include_once 'form/contact.php';

// donne une valeur à $page
$page="index";

if (isset($_GET['page'])){
    $page = $_GET['page'];
}
// si page = index, affiche la page HOME
if ($page=="index"){
    $content = formHome($db);
}
   elseif ($page=="presentation"){
       $content = formPresentation($db);
   }else if ($page=="services") {
        $content = formService($db);
   }else if ($page=="portfolio") {
       $content = formPortfolio($db);
   }else if ($page=="contact"){
        $content =formContact($db);
   }

affichePAge($content);


function crudDb($db, $request,$params =[])
{
    try {
        $reponse = $db->prepare($request);
        $reponse->execute($params);
    } catch (Exception $ex) {

    }
    return $reponse;
}