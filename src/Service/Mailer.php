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

use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Mime;
use Zend\Mime\Part as MimePart;


/**
* Mailer
* Klasse für den Versand der E-Mails zuständig
* 
* @package ZfMailer
* @subpackage Service
*/
class Mailer extends AbstractMailer
{

  /**
   * @var string Template für Text E-Mails
   */
  private $textTemplate = 'mail/default-text';

  /**
   * @var string|null Template für HTML E-Mails
   */
  private $htmlTemplate = null;

  /**
   * Neue Nachricht
   *
   * @param string $to Empfänger der Nachricht
   * @param string $subject Betreff der Nachricht
   * @param string|null $from Absender der Nachricht
   * @return \Zend\Mail\Message|boolean Mail
   */
  public function createNewMail($to, $subject, $from = null)
  {

    // prüfen, ob Absender vorhanden ist
    if (!isset($from) || empty($from)) {

      $from = $this->getOptions()->getDefaultFrom();

      if (!isset($from) || empty($from)) {
        $this->setErrorMessage('Es wurde kein Absender angegeben oder konfiguriert.');
        return false;
      }

      $from = $this->getOptions()->getDefaultFrom();

    }

    // Empfänger prüfen
    if (!isset($to) || empty($to)) {
      $this->setErrorMessage('Es wurde kein Empfänger angegeben.');
      return false;
    }

    // Betreff prüfen
    if (!isset($subject) || empty($subject)) {
      $this->setErrorMessage('Es wurde kein Betreff angegeben.');
      return false;
    }

    $message = $this->getMailMessage();
    $message->setFrom($from);
    $message->setTo($to);
    $message->setSubject($subject);

    return $message;

  }

  /**
   * Erstellt den Body der E-Mail, fügt Variablen hinzu und rendert den Inhalt
   * @param array $mailContent  Inhaltsvaiablen
   * @param string|null $templateText Template für Text E-Mails (optional)
   * @param string|null $templateHtml Template für HTML (Multipart) E-Mails (optional)
   */
  public function setContent($mailContent, $templateText = null, $templateHtml = null)
  {

    $message = $this->getMailMessage();

    if (isset($templateText) || !empty($templateText)) {
      $this->textTemplate = $templateText;
    }

    if (isset($templateHtml) || !empty($templateHtml)) {
      $this->htmlTemplate = $templateHtml;
    }

    // var_dump($this->textTemplate, $this->htmlTemplate);
    
    $renderer = $this->getRenderer();
    $body = $renderer->render($this->textTemplate, $mailContent);

    $message->setBody($body);



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

    // in Factory verschieben und aus config auslesen
    $message->getHeaders()->addHeaders(array('X-Mailer' => 'ZfMailer 1.0.1'));

    return $message;

  }

  /**
   * Versendet die E-Mails
   * @return Boolean Gibt True zurück, wenn die E-Mail erfolgreich versendet wurde, sonst False
   */
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

  

}
