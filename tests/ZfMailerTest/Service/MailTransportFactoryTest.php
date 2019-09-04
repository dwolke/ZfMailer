<?php
/**
 * Tests
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    2.0.0
 */

namespace ZfMailerTest\Service;

use PHPUnit\Framework\TestCase;
use ZfMailer\Service\MailTransportFactory;
use ZfMailer\Options\ModuleOptions;
use Zend\ServiceManager\ServiceManager;

/**
 * Test for {@see \ZfMailer\Service\MailTransportFactory}
 *
 * @author Daniel Wolkenhauer <hello@dw-labs.de>
 */
class MailTransportFactoryTest extends TestCase
{

  /**
   * @covers ZfMailer\Service\MailTransportFactory::createService
   */
  public function testCreateService()
  {

    $smMock = $this->getMockBuilder('Zend\ServiceManager\ServiceManager')->getMock();
    $smMock->expects($this->any())
            ->method('get')
            ->with('ZfMailerOptions')
            ->will($this->returnValue(new ModuleOptions()));
    $factory = new MailTransportFactory();
    $runner = $factory->createService($smMock);

    $this->assertInstanceOf('Zend\Mail\Transport\Smtp', $runner);

  }

  /**
   * @covers ZfMailer\Service\MailTransportFactory::createService
   */
  public function testCreateServiceWithSsl()
  {

    $ssl = new ModuleOptions();
    $ssl->setSmartHost(array('server_name' => '', 'server_port' => '465', 'username' => '', 'password' => ''));

    $smMock = $this->getMockBuilder('Zend\ServiceManager\ServiceManager')->getMock();
    $smMock->expects($this->any())
            ->method('get')
            ->with('ZfMailerOptions')
            ->will($this->returnValue($ssl));
    $factory = new MailTransportFactory();
    $runner = $factory->createService($smMock);

    $this->assertInstanceOf('Zend\Mail\Transport\Smtp', $runner);

  }

  /**
   * @covers ZfMailer\Service\MailTransportFactory::createService
   */
  public function testCreateServiceWithTls()
  {

    $ssl = new ModuleOptions();
    $ssl->setSmartHost(array('server_name' => '', 'server_port' => '587', 'username' => '', 'password' => ''));

    $smMock = $this->getMockBuilder('Zend\ServiceManager\ServiceManager')->getMock();
    $smMock->expects($this->any())
            ->method('get')
            ->with('ZfMailerOptions')
            ->will($this->returnValue($ssl));
    $factory = new MailTransportFactory();
    $runner = $factory->createService($smMock);

    $this->assertInstanceOf('Zend\Mail\Transport\Smtp', $runner);

  }

  /**
   * @covers ZfMailer\Service\MailTransportFactory::createService
   */
  public function testCreateServiceWithSslNull()
  {

    $ssl = new ModuleOptions();
    $ssl->setSmartHost(array('server_name' => '', 'server_port' => '1', 'username' => '', 'password' => ''));

    $smMock = $this->getMockBuilder('Zend\ServiceManager\ServiceManager')->getMock();
    $smMock->expects($this->any())
            ->method('get')
            ->with('ZfMailerOptions')
            ->will($this->returnValue($ssl));
    $factory = new MailTransportFactory();
    $runner = $factory->createService($smMock);

    $this->assertInstanceOf('Zend\Mail\Transport\Smtp', $runner);

  }

}
