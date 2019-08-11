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
use Zend\Mail\Transport;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

/**
* Mailer Factory
* Initilisiert den Transport-Service
* 
* @package ZfMailer
* @subpackage Service
*/
class MailTransportFactory implements FactoryInterface
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

    $defaultConfig = $config['zf_mailer']['mail_transport'];
    $transportClass   = $defaultConfig['class'];
    $transportOptions = $defaultConfig['options'];

    switch ($transportClass) {

      case 'Zend\Mail\Transport\Sendmail':
      case 'Sendmail':
      case 'sendmail';
        $transport = new Transport\Sendmail();
        break;

      case 'Zend\Mail\Transport\Smtp';
      case 'Smtp';
      case 'smtp';
        $options = new Transport\SmtpOptions($transportOptions);
        $transport = new Transport\Smtp($options);
        break;

      case 'Zend\Mail\Transport\File';
      case 'File';
      case 'file';
        $options = new Transport\FileOptions($transportOptions);
        $transport = new Transport\File($options);
        break;

      default:
        throw new \DomainException(sprintf(
          'Unknown mail transport type provided ("%s")',
          $transportClass
        ));

    }

    return $transport;

  }

}
