<?php




final class Constants
{

  //consantes relatives aux chemins

  const REPOSITORY_VUE = '/Vue/';

  const REPOSITORY_MODEL = '/Model/';

  const REPOSITORY_KERNEL = '/Kernel/';

  const REPOSITORY_CONTROLLER = '/Controller/';

  const REPOSITORY_EXCEPTIONS = '/Exceptions/';

  //besoin de remonter d'un cran pour acceder aux autre repo
  public static function repositoryRoot(){
      return realpath(__DIR__ . '/../');
  }

  public static function kernelRepository(){
    return self::repositoryRoot() . self::REPOSITORY_KERNEL;
  }

  public static function vueRepository(){
    return self::repositoryRoot() . self::REPOSITORY_VUE;
  }

  public static function modelRepository(){
    return self::repositoryRoot() . self::REPOSITORY_MODEL;
  }

  public static function controllerRepository(){
    return self::repositoryRoot() . self::REPOSITORY_CONTROLLER;
  }

  public static function exceptionsRepository(){
    return self::repositoryRoot() . self::REPOSITORY_EXCEPTIONS;
  }


}
