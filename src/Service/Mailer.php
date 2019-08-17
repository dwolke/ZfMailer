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
   * @todo #ZFMAIL-2 weiter Header einfügen: X-Mailer, Org, usw.
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
   * Bereitet die E-Mail vor, fügt die Content-Variablen ein, rendert das Template
   * und gibt ein fertiges Zend\Mail\Message Objekt zurück
   * 
   * @todo #ZFMAIL-3 Datentyp von $contentValues prüfen, falls kein Array, Fehler
   * @param array $contentValues Array mit Werten, die in deie E-Mail eingefügt werden
   * @param string|null $textTemplate Template für eine E-Mail im Textformat
   * @return \Zend\Mail\Message|boolean fertiges Mail-Objekt
   */
  public function prepareAsText(array $contentValues, string $textTemplate = null)
  {

    $message = $this->getMailMessage();

    if (isset($textTemplate) || !empty($textTemplate)) {
      $this->textTemplate = $textTemplate;
    }

    $renderer = $this->getRenderer();
    $body = $renderer->render($this->textTemplate, $contentValues);
    $message->setBody($body);
    
  }

  /**
   * Bereitet die E-Mail vor, fügt die Content-Variablen ein, rendert die Templates
   * fügt die Teile für Text- und HTML-Inhalte zusammen und gibt ein fertiges
   * Zend\Mail\Message Objekt zurück
   * 
   * @param array $contentValues Array mit Werten, die in die E-Mail eingefügt werden
   * @param string|null $textTemplate Template für den Text-Teil der E-Mail
   * @param string|null $htmlTemplate Template für den HTML-Teil der E-Mail
   */
  public function prepareAsMultipart(array $contentValues, string $textTemplate = null, string $htmlTemplate = null)
  {
    # code ...
  }

  public function createMultiPartMail($to, $subject, $txtTemplate, $htmlTemplate, $contentValues = array(), $from = null, $encoding = 'UTF-8')
  {

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
