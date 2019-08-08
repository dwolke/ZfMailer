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
   * @var string Zeichensatz für E-Mails
   */
  protected $encoding = 'UTF-8';

  /**
   * @var string Smarthost, über den E-Mails gesendet werden
   */
  protected $smartHost = 'localhost';


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
   * Setter für smartHost
   * @param string $smartHost Smarthost
   */
  public function setSmartHost($smartHost)
  {
    $this->smartHost = $smartHost;
    return $this;
  }

  /**
   * Getter für smartHost
   * @return string Smarthost
   */
  public function getSmartHost()
  {
    return $this->smartHost;
  }

}
