<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    1.0.0
 */

namespace ZfMailer\Service;

use Zend\ServiceManager\FactoryInterface;
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

  /**
   * Create Service Factory
   *
   * @param ServiceLocatorInterface $serviceLocator
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    $options = $serviceLocator->get('ZfMailerOptions');
    $renderer = $serviceLocator->get('ZfMailer\View\MailRenderer');
    $message = $serviceLocator->get('ZfMailer\Service\MailMessage');
    $transport = $serviceLocator->get('ZfMailer\Service\Transport');
    
    $service = new Mailer();
    $service->setOptions($options);
    $service->setRenderer($renderer);
    $service->setMailMessage($message);
    $service->setTransport($transport);

    return $service;

  }

}
