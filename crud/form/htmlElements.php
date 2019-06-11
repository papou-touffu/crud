<?php

include_once 'form/connection.php';

function affichePAge($content){
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio Dargent Cédric</title>
    <link rel="stylesheet" type="text/css" href="form/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
</head>
<body>
<header>
  <div class="menu">
<nav>
    <ul>
        <li><a class="view" href="?page=index">Home</a></li>
        <li><a href="?page=presentation">présentation</a></li>
        <li><a href="?page=portfolio">portfolio</a> </li>
        <li><a href="?page=services">services</a></li>
        <li><a href="?page=contact">contact</a></li>

    </ul>
</nav>
</div>
</header>
';
    echo $content;

    echo '    <footer class="footer-index">
    <p class="facebook" ><a href="https://www.facebook.com/"> <i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</p></a>
    <p class="linkedin"><a href="https://fr.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i>Linkedin</p>
    <p class="mail"><a href="mailto:dargentcedric1@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>dargentcedric1@gmail.com</p></a>
    <p class="copyrighy">&copy; Copyright 2019 Cédric Dargent - Tous Droits Réservés  Designed By Cédric Dargent</p>
</footer>

</html>';
}