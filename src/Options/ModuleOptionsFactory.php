<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    3.0.0
 */

namespace ZfMailer\Options;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


/**
* ModuleOptions Factory
* 
* @package ZfMailer
* @subpackage Options
*/
class ModuleOptionsFactory implements FactoryInterface
{

  public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
  {

    $config = $serviceManager->get('config');

    return new ModuleOptions(isset($config['ZfMailer']) ? $config['ZfMailer'] : array());

  }

  /**
   * Create Service Factory
   *
   * @param ServiceLocatorInterface $serviceLocator
   */
  // public function createService(ServiceLocatorInterface $serviceLocator)
  // {

  //   $config = $serviceLocator->get('config');
    
  //   return new ModuleOptions(isset($config['ZfMailer']) ? $config['ZfMailer'] : array());

  // }
  public function createService(ServiceLocatorInterface $serviceLocator)
  {
    /* @var ControllerManager $controllerManager*/
    // $serviceManager = $controllerManager->getServiceLocator();

    // return $this->__invoke($serviceManager, null);
    return $this->__invoke($serviceLocator, null);
  }

}
