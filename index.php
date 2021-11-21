<?php

/*
     url pour notre premier test MVC Hello World,
     nous n'avons pas d'action précisée on visera celle par défaut
     /index.php?ctrl=helloworld
     /helloworld
     /controleur/nom_action/whatever/whatever2/
    */

define("APP_PATH", dirname(__FILE__, 2));


    //point d'entrée de l'application
    require 'Kernel/AutoLoad.php';

    $S_urlToSplit = isset($_GET['url']) ? $_GET['url'] : null;
    $A_postParams = isset($_POST) ? $_POST : null;

    Vue::openBuffer(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
    try {
        $O_controleur = new Controller($S_urlToSplit, $A_postParams);
        $O_controleur->execute();
    } catch (ControllerException $O_exception) {
        echo('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }


    // Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
    $content = Vue::getContentBuffer();

    // On affiche le contenu dans la partie body du gabarit général
    Vue::show('skeleton', array('body' => $content));