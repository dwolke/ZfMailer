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
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Factory\FactoryInterface;
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

  public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
  {

    $options = $serviceManager->get('ZfMailerOptions');
    // $defaultEncoding = $options->getEncoding();

    $mailMessage = new Message();

    // TODO: prüfen, wie Encoding richtig gesetzt werden kann (Sonderzeichen im Header)
    // if (isset($defaultEncoding)) {
    //   $mailMessage->setEncoding($defaultEncoding);
    // }
    
    return $mailMessage;

  }

  /**
   * Create Service Factory
   *
   * @param ServiceLocatorInterface $serviceLocator
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {
    
    // $options = $serviceLocator->get('ZfMailerOptions');
    // // $defaultEncoding = $options->getEncoding();

    // $mailMessage = new Message();

    // // TODO: prüfen, wie Encoding richtig gesetzt werden kann (Sonderzeichen im Header)
    // // if (isset($defaultEncoding)) {
    // //   $mailMessage->setEncoding($defaultEncoding);
    // // }
    
    // return $mailMessage;
    return $this->__invoke($serviceLocator, null);

  }

}
