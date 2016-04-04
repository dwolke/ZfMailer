<?php
/**
 * @Author: Daniel
 * @Date:   2016-03-31 20:45:14
 * @Last Modified by:   Daniel
 * @Last Modified time: 2016-04-01 17:27:33
 */

namespace ZfMailer\Service;

use Traversable;
use Zend\Mail\Message;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

class MailMessageFactory implements FactoryInterface
{

  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    $config = $serviceLocator->get('config');

    if ($config instanceof Traversable) {
      $config = ArrayUtils::iteratorToArray($config);
    }

    $defaultConfig = $config['zf_mailer']['defaults'];
    $mailMessage = new Message();

    if (isset($defaultConfig['from'])) {
      $mailMessage->addFrom($defaultConfig['from']);
    }

    if (isset($defaultConfig['defaultEncoding'])) {
      $mailMessage->setEncoding($defaultConfig['defaultEncoding']);
    }
    
    return $mailMessage;

  }

}
