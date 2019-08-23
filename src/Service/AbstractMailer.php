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

use Zend\View\Renderer\RendererInterface;
use ZfMailer\Options\ModuleOptions;

/**
* ZfMailer Service
* Abstrakte Klasse zur Initialisierung
* 
* @package ZfMailer
* @subpackage Service
*/
abstract class AbstractMailer
{

  /**
   * @var string Fehlermeldung
   */
  protected $errorMessage = null;

  /**
   * @var ModuleOptions Options
   */
  protected $options = null;
  
  /**
   * @var \Zend\View\Renderer\RendererInterface Renderer für Layouts
   */
  protected $renderer = null;
  
  /**
   * @var \Zend\Mail\Message E-Mailnachricht
   */
  protected $mailMessage = null;
  
  /**
   * @var \Zend\Mail\Transport Mailer-Transport
   */
  protected $transport = null;

  /**
   * Setzt Mailer-Options
   * @param ModuleOptions $options Mailer Options
   */
  public function setOptions(ModuleOptions $options)
  {
    $this->options = $options;
    return $this;
  }

  /**
   * Gibt Mailer Options zurück
   * @return ModuleOptions Mailer Options
   */
  public function getOptions()
  {
    return $this->options;
  }

  /**
   * Setzt den Renderer für eine E-Mailnachricht
   * @param \Zend\View\Renderer\RendererInterface $renderer Renderer
   */
  public function setRenderer(RendererInterface $renderer)
  {
    $this->renderer = $renderer;
    return $this;
  }

  /**
   * Gibt den Renderer zurück
   * @return \Zend\View\Renderer\RendererInterface Renderer
   */
  public function getRenderer()
  {
    return $this->renderer;
  }

  /**
   * Setzt eine E-Mailnachricht
   * @param \Zend\Mail\Message $mailMessage Mail-Message
   */
  public function setMailMessage($mailMessage)
  {
    $this->mailMessage = $mailMessage;
    return $this;
  }

  /**
   * Gibt ein Mail-Message Objekt zurück
   * @return \Zend\Mail\Message Mail-Message
   */
  public function getMailMessage()
  {
    return $this->mailMessage;
  }

  /**
   * Setzt E-Mail-Transport
   * @param \Zend\Mail\Transport $transport E-Mail-Transport
   */
  public function setTransport($transport)
  {
    $this->transport = $transport;
    return $this;
  }

  /**
   * Gibt Tramsport Objekt zurück
   * @return \Zend\Mail\Transport E-Mail-Transport
   */
  public function getTransport()
  {
    return $this->transport;
  }

  /**
   * Setzt eine Fehlermeldung
   * @param string $errorMessage Fehlermeldung
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
    return $this;
  }

  /**
   * Gibt eine Fehlermeldung zurück
   * @return string Fehlermeldung
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }

}
