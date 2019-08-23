<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    0.1.0
 */

namespace ZfMailer\Options;

use Zend\Stdlib\AbstractOptions;

/**
* ModuleOptions
* Einstellungen für ZfMailer
* 
* @package ZfMailer
* @subpackage Options
*/
class ModuleOptions extends AbstractOptions
{

  /**
   * Turn off strict options mode
   */
  protected $__strictMode__ = false;

  /**
   * @var string Smarthost, über den E-Mails gesendet werden
   */
  protected $smart_host = array(
    'server_name' => 'mx.mail-domain.com',
    'server_port' => 25,
    'username'    => 'username',
    'password'    => 'password'
  );

  /**
   * @var string Zeichensatz für E-Mails
   */
  protected $encoding = 'UTF-8';

  /**
   * @var string Absender der E-Mail
   */
  protected $default_from = '';

  /**
   * @var string E-Mailadresse für NDRs
   */
  protected $return_path = '';

  /**
   * @var string E-Mailadresse für Antworten
   */
  protected $reply_to = '';

  /**
   * @var string Kennung des Mailers
   */
  protected $x_mailer = 'ZfMailer 0.1.0';

  /**
   * @var string Name des Unternehmens
   */
  protected $organization = '';

  /**
   * Setter für smart_host
   * @param string $smart_host Smarthost
   */
  public function setSmartHost($smart_host)
  {
    $this->smart_host = $smart_host;
    return $this;
  }

  /**
   * Getter für smart_host
   * @return string Smarthost
   */
  public function getSmartHost()
  {
    return $this->smart_host;
  }

  /**
   * Setter für Encoding
   * @param string $encoding Zeichensatz
   */
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
    return $this;
  }

  /**
   * Getter für Encoding
   * @return string Zeichensatz
   */
  public function getEncoding()
  {
    return $this->encoding;
  }

  /**
   * Setter für default_from
   * @param string $default_from Absender der E-Mail
   */
  public function setDefaultFrom($default_from)
  {
    $this->default_from = $default_from;
    return $this;
  }

  /**
   * Getter für default_from
   * @return string Absender der E-Mail
   */
  public function getDefaultFrom()
  {
    return $this->default_from;
  }

  /**
   * Setter für return_path
   * @param string $return_path E-Mailadresse für NDRs
   */
  public function setReturnPath($return_path)
  {
    $this->return_path = $return_path;
    return $this;
  }

  /**
   * Getter für return_path
   * @return string E-Mailadresse für NDRs
   */
  public function getReturnPath()
  {
    return $this->return_path;
  }

  /**
   * Setter für reply_to
   * @param string $reply_to E-Mailadresse für Antworten
   */
  public function setReplyTo($reply_to)
  {
    $this->reply_to = $reply_to;
    return $this;
  }

  /**
   * Getter für reply_to
   * @return string E-Mailadresse für Antworten
   */
  public function getReplyTo()
  {
    return $this->reply_to;
  }

  /**
   * Setter für x_mailer
   * @param string $x_mailer individuelle Kennung des Mailers
   */
  public function setXMailer($x_mailer)
  {
    $this->x_mailer = $x_mailer;
    return $this;
  }

  /**
   * Getter für x_mailer
   * @return string individuelle Kennung des Mailers
   */
  public function getXMailer()
  {
    return $this->x_mailer;
  }

  /**
   * Setter für organization
   * @param string $organization Name des Unternehmens
   */
  public function setOrganization($organization)
  {
    $this->organization = $organization;
    return $this;
  }

  /**
   * Getter für organization
   * @return string Name des Unternehmens
   */
  public function getOrganization()
  {
    return $this->organization;
  }

}
