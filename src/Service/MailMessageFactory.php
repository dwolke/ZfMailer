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

use Traversable;
use Zend\Mail\Message;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

/**
* Message Factory
* Erstellt ein Mail-Objekt
* 
* @package ZfMailer
* @subpackage Service
*/
class MailMessageFactory implements FactoryInterface
{

  /**
   * Create Service Factory
   *
   * @param ServiceLocatorInterface $serviceLocator
   */
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
