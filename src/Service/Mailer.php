<?php
/**
 * @Author: Daniel
 * @Date:   2016-03-31 19:13:13
 * @Last Modified by:   Daniel
 * @Last Modified time: 2016-04-01 18:28:26
 */

/**
 * Todo: Kommentare
 */

namespace ZfMailer\Service;

use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Mime;
use Zend\Mime\Part as MimePart;
use Zend\View\Renderer\RendererInterface;

class Mailer
{

  protected $errorMessage = null;
  protected $renderer = null;
  protected $mailMessage = null;
  protected $transport = null;
  
  private function getDefaultMessage($to, $subject, $body, $from = null)
  {

    if (!isset($body) || empty($body)) {
      return false;
    }

    if (!isset($to) || empty($to)) {
      return false;
    }

    $message = $this->getMailMessage();
    $message->setSubject($subject)
            ->setBody($body)
            ->setTo($to);

    if (isset($from)) {
      $message->setFrom($from);
    }

    // if (isset($encoding)) {
    //   $message->setEncoding($encoding);
    // }

    // Todo: in Factory verschieben und aus config auslesen
    $message->getHeaders()->addHeaders(array('X-Mailer' => 'ZfMailer 1.0.1'));

    return $message;

  }

  public function createTextMail($to, $subject, $templateOrModel, $values = array(), $from, $encoding = 'UTF-8')
  {
    $renderer = $this->getRenderer();
    $body = $renderer->render($templateOrModel, $values);

    $mail = $this->getDefaultMessage($to, $subject, $body, $from);
    $mail->setEncoding($encoding);
    
    return $mail;
  }

  public function createMultiPartMail($to, $subject, $txtTemplate, $htmlTemplate, $contentValues = array(), $from = null, $encoding = 'UTF-8')
  {

    // Todo: siehe https://github.com/zendframework/zf2/issues/4917
    // Todo: Variablen prüfen

    $renderer = $this->getRenderer();

    $txtContent = $renderer->render($txtTemplate, $contentValues);
    $htmlContent = $renderer->render($htmlTemplate, $contentValues);

    $text = new MimePart($txtContent);
    $text->type = "text/plain";
    $text->charset = 'utf-8';

    $html = new MimePart($htmlContent);
    $html->type = "text/html";
    $html->charset = 'utf-8';

    $body = new MimeMessage();
    $body->setParts(array($text, $html));

    $mail = $this->getDefaultMessage($to, $subject, $body, $from);
    $mail->getHeaders()->get('content-type')->setType('multipart/alternative');
    $mail->setEncoding($encoding);

    return $mail;

  }

  public function sendEmail()
  {

    try {
      $this->getTransport()->send($this->getMailMessage());
      return true;
    } catch (RuntimeException $e) {
      //echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
      $this->setErrorMessage($e->getMessage());
      return false;
    }
    
  }

  public function setRenderer(RendererInterface $renderer)
  {
    $this->renderer = $renderer;
    return $this;
  }

  public function getRenderer()
  {
    return $this->renderer;
  }

  public function setMailMessage($mailMessage)
  {
    $this->mailMessage = $mailMessage;
    return $this;
  }

  public function getMailMessage()
  {
    return $this->mailMessage;
  }

  public function setTransport($transport)
  {
    $this->transport = $transport;
    return $this;
  }

  public function getTransport()
  {
    return $this->transport;
  }

  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
    return $this;
  }

  public function getErrorMessage()
  {
    return $this->errorMessage;
  }

}
