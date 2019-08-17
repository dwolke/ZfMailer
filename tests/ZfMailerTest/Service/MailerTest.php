<?php

namespace ZfMailerTest\Service;

use PHPUnit\Framework\TestCase;
use ZfMailer\Service\Mailer;
use ZfMailer\Options\ModuleOptions as Options;
use Zend\Mail\Message as Message;
use Zend\View\Renderer\PhpRenderer as Renderer;
use Zend\Mail\Transport as Transport;

/**
 * Test for {@see \ZfMailer\Service\Mailer}
 *
 * @author Daniel Wolkenhauer <hello@dw-labs.de>
 */
class MailerTest extends TestCase
{

  protected $service;

  protected $message;
  protected $renderer;
  protected $transport;
  protected $options;


  public function setUp()
  {

    $smtpOptions = array(
      'host'             => 'mailer.host.com',
      'port'             => '25',
      'connectionClass'  => 'login',
      'connectionConfig' => array(
        'username' => 'username',
        'password' => 'password',
      ),
    );

    $smtp = new Transport\SmtpOptions($smtpOptions);

    $this->message = new Message();
    $this->renderer = new Renderer();
    $this->transport = new Transport\Smtp($smtp);
    $this->options = new Options();

    $this->service = new Mailer();
    $this->service->setMailMessage($this->message);
    $this->service->setRenderer($this->renderer);
    $this->service->setTransport($this->transport);
    $this->service->setOptions($this->options);

    $this->options->setDefaultFrom('default@mailer.com');

  }

  /**
   * @covers ZfMailer\Service\Mailer::createNewMail
   */
  public function testCreateNewMail()
  {

    $testMailer = $this->service;

    //$this->assertInstanceOf('ZfMailer\Options\ModuleOptions', $this->mailer->getOptions());
    $from = 'sender@mailer.com';
    $to = 'recipient@mailer.com';
    $subject = 'Testing Mailer';

    $testMail = $testMailer->createNewMail($to, $subject);
    $this->assertInstanceOf('Zend\Mail\Message', $testMail);
    $this->assertTrue($testMail->isValid());
    
    $this->options->setDefaultFrom('');
    
    $testMail = null;
    $testMail = $testMailer->createNewMail($to, $subject, null);
    $this->assertFalse($testMail);

    $testMail = null;
    $testMail = $testMailer->createNewMail('', $subject, $from);
    $this->assertFalse($testMail);

    $testMail = null;
    $testMail = $testMailer->createNewMail($to, '', $from);
    $this->assertFalse($testMail);
    
    $testMail = null;
    $testMail = $testMailer->createNewMail($to, $subject, $from);
    $this->assertInstanceOf('Zend\Mail\Message', $testMail);
    $this->assertTrue($testMail->isValid());

  }

  /**
   * Helper Methode zum Testen privater Methoden
   */
  public function getMethod($methodName)
  {

    $method = new \ReflectionMethod('Raact\Service\SignupService', $methodName);
    $method->setAccessible(true);

    return $method;

  }

}
