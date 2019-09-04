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
use ZfMailer\Service\MailMessageFactory;
use ZfMailer\Options\ModuleOptions;
use Zend\ServiceManager\ServiceManager;

/**
 * Test for {@see \ZfMailer\Service\MailMessageFactory}
 *
 * @author Daniel Wolkenhauer <hello@dw-labs.de>
 */
class MailMessageFactoryTest extends TestCase
{

  /**
   * @covers ZfMailer\Service\MailMessageFactory::createService
   */
  public function testCreateService()
  {

    $smMock = $this->getMockBuilder('Zend\ServiceManager\ServiceManager')->getMock();
    $smMock->expects($this->any())
            ->method('get')
            ->with('ZfMailerOptions')
            ->will($this->returnValue(new ModuleOptions()));
    $factory = new MailMessageFactory();
    $runner = $factory->createService($smMock);

    $this->assertInstanceOf('Zend\Mail\Message', $runner);

  }

}
