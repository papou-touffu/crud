<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=dargent;', 'dargent', '3QrQp1OA');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
}
