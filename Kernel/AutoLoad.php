<?php

require 'Kernel/Constants.php';

final class AutoLoad
{

  //function pour charger les classes du noyau
  public static function loadClassKernel ($S_className)
  {
    $S_file = Constants::kernelRepository() . "$S_className.php";
    return static::_toLoad($S_file);
  }

  //function pour charger les classes Modele
  public static function loadClassModel ($S_className)
  {
    $S_file = Constants::modelRepository() . "$S_className.php";
    return static::_toLoad($S_file);
  }

  //function pour charger les classes Vue
  public static function loadClassVue ($S_className)
  {
    $S_file = Constants::vueRepository() . "$S_className.php";
    return static::_toLoad($S_file);
  }

  //function pour charger les classes Controleur
  public static function loadClassController ($S_className)
  {
    $S_file = Constants::controllerRepository() . "$S_className.php";
    return static::_toLoad($S_file);
  }

  //function pour charger classe Exceptions
    public static function loadClassExceptions ($S_className)
    {
        $S_file = Constants::exceptionsRepository() . "$S_className.php";
        return static::_toLoad($S_file);
    }

  //function charger fichier
  private static function _toLoad($S_fileToLoad)
  {
    if (is_readable($S_fileToLoad))
    {
        require $S_fileToLoad;
    }
  }
}

//Empilage de tous ces autoload

spl_autoload_register('AutoLoad::loadClassKernel');
spl_autoload_register('AutoLoad::loadClassModel');
spl_autoload_register('AutoLoad::loadClassVue');
spl_autoload_register('AutoLoad::loadClassController');
