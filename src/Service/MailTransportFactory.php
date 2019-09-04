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
   * @todo #ZFMAIL-1 - Konfiguration für SSL verbesern
   * @param ServiceLocatorInterface $serviceLocator
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    $options = $serviceLocator->get('ZfMailerOptions');

    $smartHost = $options->getSmartHost();
    $ssl = null;

    switch ($smartHost['server_port']) {
      case '25':
        $ssl = null;
        break;
      case '465':
        $ssl = 'ssl';
        break;
      case '587':
        $ssl = 'tls';
        break;
      
      default:
        $ssl = null;
        break;
    }

    $smtpOptions = array(
      'host'             => $smartHost['server_name'],
      'port'             => $smartHost['server_port'],
      'connectionClass'  => 'login',
      'connectionConfig' => array(
        'username' => $smartHost['username'],
        'password' => $smartHost['password'],
      ),
    );

    if (isset($ssl) && !empty($ssl)) {
      $smtpOptions['connectionConfig']['ssl'] = $ssl;
    }

    $transportOptions = new Transport\SmtpOptions($smtpOptions);
    $transport = new Transport\Smtp($transportOptions);

    return $transport;

  }

}
