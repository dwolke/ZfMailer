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
    
    $options = $serviceLocator->get('ZfMailerOptions');
    // $defaultEncoding = $options->getEncoding();

    $mailMessage = new Message();

    // TODO: prüfen, wie Encoding richtig gesetzt werden kann (Sonderzeichen im Header)
    // if (isset($defaultEncoding)) {
    //   $mailMessage->setEncoding($defaultEncoding);
    // }
    
    return $mailMessage;

  }

}
