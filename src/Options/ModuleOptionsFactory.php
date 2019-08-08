<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    0.1.0
 */

namespace ZfMailer\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
* ModuleOptions Factory
* 
* @package ZfMailer
* @subpackage Options
*/
class ModuleOptionsFactory implements FactoryInterface
{

  /**
   * Create Service Factory
   *
   * @param ServiceLocatorInterface $serviceLocator
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    $config = $serviceLocator->get('config');
    
    return new ModuleOptions(isset($config['ZfMailer']) ? $config['ZfMailer'] : array());

  }

}
