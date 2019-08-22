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
use ZfMailer\Service\MailerFactory;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Renderer\PhpRenderer;

/**
 * Test for {@see \ZfMailer\Service\MailTransportFactory}
 *
 * @author Daniel Wolkenhauer <hello@dw-labs.de>
 */
class MailerFactoryTest extends TestCase
{

  /**
   * @covers ZfMailer\Service\MailerFactory::createService
   */
  public function testCreateService()
  {

    $smMock = $this->getMockBuilder('Zend\ServiceManager\ServiceManager')->getMock();
    $optionsMock = $this->getMockBuilder('ZfMailer\Options\ModuleOptions')->disableOriginalConstructor()->getMock();
    $rendererMock = $this->getMockBuilder('Zend\View\Renderer\PhpRenderer')->disableOriginalConstructor()->getMock();
    // $messageMock = $this->getMockBuilder('ZfMailer\Service\MailMessageFactory')->disableOriginalConstructor()->getMock();
    // $transportMock = $this->getMockBuilder('ZfMailer\Service\MailTransportFactory')->disableOriginalConstructor()->getMock();

    $smMock->expects($this->at(0))
            ->method('get')
            ->with('ZfMailerOptions')
            ->will($this->returnValue($optionsMock));

    $smMock->expects($this->at(1))
            ->method('get')
            ->with('ZfMailer\View\MailRenderer')
            ->will($this->returnValue($rendererMock));

    $factory = new MailerFactory();
    $runner = $factory->createService($smMock);

    $this->assertInstanceOf('ZfMailer\Service\Mailer', $runner);

  }

}
