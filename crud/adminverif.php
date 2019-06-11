<?php

include_once 'form/connection.php';

// Si les logins sont mauvais
function displayWrongCredentials(){
    echo '<p>MAUVAIS LOGIN!</p>';
}
// Verifie que quelque chose est posté
function isFormPosted(){
    if(count($_POST)>0){
        return true;
    }
    return false;
}
// Vérifie si les logins sont bons
function are_CredentialsOk(){
    $login='admin';
    $pass='admin';
    if($_POST['login'] == $login && $_POST['password']== $pass){
        return true;
    }
    return false;

}
// détruit la session
if (isset($_GET['logout'])){
    session_destroy();
    header('Location: /crud/admin.php');
}
// si le user est log, montre le contenu caché sinon redemande une connection
if (isUserLogged()){
    displayProtectedContent($db);
}
else{
    if (isFormSubmitted()){
        displayWrongCredentials();
    }
    displayForm();
}
// Fonction pour voir regarder si il y a un post
function isFormSubmitted(){
    return count($_POST);
}
// Fonction si le user est log
function isUserLogged(){
    if (sessionExists()){
        return true;
    }
    $login = 'admin';
    $pass = "admin";

    if (isset($_POST['login']) && isset($_POST['password'])){
        if ($_POST['login'] === $login && $_POST['password'] === $pass){
            addSessionToken();
            return true;
        }
    }

    return false;
}
// Fonction pour créer une session
function sessionExists(){
    return isset($_SESSION['token']);
}
// Fonction pour créer un token
function addSessionToken(){
    $_SESSION['token'] =   uniqid();
}

// Fonction pour préparer les requêtes


function isFormValid(){
    if (isset($_POST['mail'])) {
        $_POST['email'] = htmlspecialchars($_POST['email']);
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
            echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
            return false;
        }
    }
    elseif (!isset($_POST['email']) || !isset($_POST['message'])) {
        echo 'Tous les champs doivent être remplis !';
        return false;
    }

    return true;

}


function displayForm(){
    echo '<form method="post" action="">';
    echo '<label for="login">Utilisateur</label>';
    echo '<input type="text" name="login" id="login">';
    echo '<label for="password">Password</label>';
    echo '<input type="password" name="password" id="password">';
    echo '<input type="submit" value="valider">';
    echo '</form>';
}