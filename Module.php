<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    0.1.0
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
