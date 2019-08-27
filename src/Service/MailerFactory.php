<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    0.1.0
 */

namespace ZfMailer\Service;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
* Mailer Factory
* Initilisiert den Mailer
* 
* @package ZfMailer
* @subpackage Service
*/
class MailerFactory implements FactoryInterface
{

  public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
  {

    $options = $serviceManager->get('ZfMailerOptions');
    $renderer = $serviceManager->get('ZfMailer\View\MailRenderer');
    $message = $serviceManager->get('ZfMailer\Service\MailMessage');
    $transport = $serviceManager->get('ZfMailer\Service\Transport');
    
    $service = new Mailer();
    $service->setOptions($options);
    $service->setRenderer($renderer);
    $service->setMailMessage($message);
    $service->setTransport($transport);

    return $service;

  }

  /**
   * Create Service Factory
   *
   * @param ServiceLocatorInterface $serviceLocator
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    // $options = $serviceLocator->get('ZfMailerOptions');
    // $renderer = $serviceLocator->get('ZfMailer\View\MailRenderer');
    // $message = $serviceLocator->get('ZfMailer\Service\MailMessage');
    // $transport = $serviceLocator->get('ZfMailer\Service\Transport');
    
    // $service = new Mailer();
    // $service->setOptions($options);
    // $service->setRenderer($renderer);
    // $service->setMailMessage($message);
    // $service->setTransport($transport);

    // return $service;

    return $this->__invoke($serviceLocator, null);

  }

}
