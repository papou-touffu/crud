<?php

include_once 'form/connection.php';

function formContact($db){
    // Insérer les données du formulaire dans la db

    $nom = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST,"message",FILTER_SANITIZE_STRING);
    if (!empty($nom && $email && $message)) {
        $request = "INSERT INTO `crud_contact`(`nom`,`email`,`message`) VALUES (:nom,:email,:message)";
        crudDb($db, $request,['nom'=>$_POST['nom'],'email'=>$_POST['email'],'message'=>$_POST['message']]);
        header('Location: ?page=contact');
    }

    $toREturn= '<div class="wrapper">

     
           
                <h1>Pour me contacter</h1>
          
      
            <div class="col col-1-4">
                <h2 id="ml_40"> Formulaire de contact</h2>
                <form action="" id="contact_form" method="post">
                    <ul id="formulaire">
                        <li><label>Nom<span class="required">*</span><br></label><input type="text" name="nom" id="name" value=""  required></li>
                        <li><label>Email<span class="required">*</span><br></label><input type="email" name="email" id="email" value=""  required></li>
                        <li class="textarea"><label>Message<span class="required">*</span><br></label><textarea name="message" id="message" required></textarea></li>
                        <li class="button_form"><input class = "button" name="submitted" id="submitted" value="Envoyez" type="submit">
                            <input class="button" id="reset" type="reset" value="Effacer" ></li>
                    </ul>
                </form>
            </div>
    </div>';

    return $toREturn;
}