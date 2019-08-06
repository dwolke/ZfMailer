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

class ModuleOptions extends AbstractOptions
{

  /**
   * Turn off strict options mode
   */
  protected $__strictMode__ = false;

  /**
   * @var string
   */
  protected $encoding = 'UTF-8';

  /**
   * @var string
   */
  protected $smartHost = 'localhost';


  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
    return $this;
  }

  public function getEncoding()
  {
    return $this->encoding;
  }

  public function setSmartHost($smartHost)
  {
    $this->smartHost = $smartHost;
    return $this;
  }

  public function getSmartHost()
  {
    return $this->smartHost;
  }

}
