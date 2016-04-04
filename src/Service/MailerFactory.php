<?php
/**
 * @Author: Daniel
 * @Date:   2016-03-31 19:15:56
 * @Last Modified by:   Daniel
 * @Last Modified time: 2016-04-01 13:09:29
 */


namespace ZfMailer\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class MailerFactory implements FactoryInterface
{

  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    $renderer = $serviceLocator->get('ZfMailer\View\MailRenderer');
    $message = $serviceLocator->get('ZfMailer\Service\MailMessage');
    $transport = $serviceLocator->get('ZfMailer\Service\Transport');
    
    $service = new Mailer();
    $service->setRenderer($renderer);
    $service->setMailMessage($message);
    $service->setTransport($transport);

    return $service;

  }

}
