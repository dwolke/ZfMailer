<?php
/**
 * Mailer-Module
 *
 * Foo bar Baz
 *
 * @author     Daniel Wolkenhauer <dw@dwolke.de>
 * @copyright  Copyright (c) 1997-2015 Daniel Wolkenhauer
 * @link       https://bitbucket.org/detema/oxid-artikelimporter
 * @version    0.0.1
 * 
 * @Date:   2016-03-31 16:37:50
 * @Last Modified by:   Daniel
 * @Last Modified time: 2016-03-31 17:58:52
 */

namespace ZfMailer;

class Module
{

  public function getAutoloaderConfig()
  {

    return array(

      'Zend\Loader\ClassMapAutoloader' => array(
        __DIR__ . '/autoload_classmap.php',
      ),

    );

  }

  public function getConfig()
  {
    return include __DIR__ . '/config/module.config.php';
  }

  // public function getServiceConfig()
  // {
  //   return include __DIR__ . '/config/service.config.php';
  // }

  // public function getControllerConfig()
  // {
  //   return include __DIR__ . '/config/controller.config.php';
  // }

}
