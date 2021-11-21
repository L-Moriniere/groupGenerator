<?php

final class Vue
{
    public static function openBuffer()
    {
        //on démarre le tampon qui sera le tampon principal
        ob_start();
    }

    public static function getContentBuffer()
    {
      //on retourne le contenu du tampon principal
      return ob_get_clean();
    }

    public static function show ($S_localisation, $A_parameters = array())
    {
        $S_fichier = Constants::vueRepository() . $S_localisation . '.php';
        $A_vue = $A_parameters;
        //demarrage du sous-tampon
        ob_start();
        
         // c'est dans ce fichier que sera utilisé A_vue, la vue est inclue dans le sous-tampon
        include $S_fichier;

        ob_end_flush();
    }

}
