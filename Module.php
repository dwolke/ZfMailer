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

/**
 * ZfMailer
 *
 * Simple Mailer for Zend Framework (Zend\Mail)
 *
 * @package ZfMailer
 */
class Module
{

  /**
   * Return an array for passing to Zend\Loader\AutoloaderFactory.
   *
   * @return array
   */
  public function getAutoloaderConfig()
  {

    return array(

      'Zend\Loader\ClassMapAutoloader' => array(
        __DIR__ . '/autoload_classmap.php',
      ),

    );

  }

  /**
   * Returns the module configuration to merge with application configuration
   *
   * @return array|\Traversable
   */
  public function getConfig()
  {
    return include __DIR__ . '/config/module.config.php';
  }

}
