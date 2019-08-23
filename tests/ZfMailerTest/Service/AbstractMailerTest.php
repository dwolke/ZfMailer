<?php
/**
 * Tests
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    0.1.0
 */

namespace ZfMailerTest\Service;

use PHPUnit\Framework\TestCase;
use ZfMailer\Service\AbstractMailer as Mailer;
use ZfMailer\Options\ModuleOptions as Options;
use Zend\Mail\Message as Message;
use Zend\View\Renderer\PhpRenderer as Renderer;
use Zend\Mail\Transport as Transport;

/**
 * Test for {@see \ZfMailer\Service\AbstractMailer}
 *
 * @author Daniel Wolkenhauer <hello@dw-labs.de>
 */
class AbstractMailerTest extends TestCase
{

  protected $mailer = null;
  protected $options = null;
  protected $message = null;
  protected $renderer = null;
  protected $transport = null;
  protected $errorMsg = null;

  protected function setUp()
  {
    
    $this->mailer = new class extends Mailer{

      public function returnThis()
      {
        return $this;
      }

    };

    $this->options = new Options();
    $this->message = new Message();
    $this->renderer = new Renderer();
    $this->transport = new Transport\Smtp();
    
  }

  /**
   * @covers ZfMailer\Service\AbstractMailer::getOptions
   * @covers ZfMailer\Service\AbstractMailer::setOptions
   */
  public function testSetGetOptions()
  {

    //$this->assertInstanceOf('ZfMailer\Service\AbstractMailer', $this->mailer->returnThis());
    $this->mailer->setOptions($this->options);
    $this->assertInstanceOf('ZfMailer\Options\ModuleOptions', $this->mailer->getOptions());

  }

  /**
   * @covers ZfMailer\Service\AbstractMailer::getMailMessage
   * @covers ZfMailer\Service\AbstractMailer::setMailMessage
   */
  public function testSetGetMailMessage()
  {
    $this->mailer->setMailMessage($this->message);
    $this->assertInstanceOf('Zend\Mail\Message', $this->mailer->getMailMessage());
  }

  /**
   * @covers ZfMailer\Service\AbstractMailer::getRenderer
   * @covers ZfMailer\Service\AbstractMailer::setRenderer
   */
  public function testSetGetRenderer()
  {
    $this->mailer->setRenderer($this->renderer);
    $this->assertInstanceOf('Zend\View\Renderer\PhpRenderer', $this->mailer->getRenderer());
  }

  /**
   * @covers ZfMailer\Service\AbstractMailer::getTransport
   * @covers ZfMailer\Service\AbstractMailer::setTransport
   */
  public function testSetGetTransport()
  {
    $this->mailer->setTransport($this->transport);
    $this->assertInstanceOf('Zend\Mail\Transport\Smtp', $this->mailer->getTransport());
  }

  /**
   * @covers ZfMailer\Service\AbstractMailer::getErrorMessage
   * @covers ZfMailer\Service\AbstractMailer::setErrorMessage
   */
  public function testSetGetErrorMessage()
  {
    $this->mailer->setErrorMessage('Eine Fehlermeldung');
    $this->assertEquals('Eine Fehlermeldung', $this->mailer->getErrorMessage());
  }

}
