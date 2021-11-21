<?php

final class Controller
{

    private $_A_urlSplit;

    private $_A_urlParams;

    private $_A_postParams;

    public function __construct ($S_url, $A_postParams)
    {
        // On élimine l'éventuel slash en fin d'URL sinon notre explode renverra une dernière entrée vide
        if ('/' == substr($S_url, -1, 1)) {
            $S_url = substr($S_url, 0, strlen($S_url) - 1);
        }
        // On éclate l'URL, elle va prendre place dans un tableau
        $A_urlSplit = explode('/', $S_url);

        if (empty($A_urlSplit[0])) {
            // Nous avons pris le parti de suffixer tous les controleurs par "Controleur"
            $A_urlSplit[0] = 'DefaultController';
        } else {
            $A_urlSplit[0] = ucfirst($A_urlSplit[0]).'Controller' ;
        }

        if (empty($A_urlSplit[1])) {
            // L'action est vide ! On la valorise par défaut
            $A_urlSplit[1] = 'defaultAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $A_urlSplit[1] = $A_urlSplit[1] . 'Action';
        }


        // on dépile 2 fois de suite depuis le début, c'est à dire qu'on enlève de notre tableau le contrôleur et l'action
        // il ne reste donc que les éventuels parametres (si nous en avons)...
        $this->_A_urlSplit['controller'] = array_shift($A_urlSplit); // on recupere le contrôleur
        $this->_A_urlSplit['action'] = array_shift($A_urlSplit); // puis l'action

        // ...on stocke ces éventuels parametres dans la variable d'instance qui leur est réservée
        $this->_A_urlParams = $A_urlSplit;

        // On  s'occupe du tableau $A_postParams
        $this->_A_postParams = $A_postParams;
    }

    //on execute
    public function execute()
    {
        if (!class_exists($this->_A_urlSplit['controller'])) {
            throw new ControllerException($this->_A_urlSplit['controller'] . " n'est pas un controller valide.");
        }

        if (!method_exists($this->_A_urlSplit['controller'], $this->_A_urlSplit['action'])) {
            throw new ControllerException($this->_A_urlSplit['action'] . " du contrôleur " .
                $this->_A_urlSplit['controller'] . " n'est pas une action valide.");
        }

        $B_called = call_user_func_array(array(new $this->_A_urlSplit['controller'],
            $this->_A_urlSplit['action']), array($this->_A_urlParams, $this->_A_postParams));

        if (false === $B_called) {
            throw new ControllerException("L'action " . $this->_A_urlSplit['action'] .
                " du contrôleur " . $this->_A_urlSplit['controller'] . " a rencontré une erreur.");
        }
    }

}
