<?php
/**
 * Tests
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    1.0.0
 */

namespace ZfMailerTest\Options;

use PHPUnit\Framework\TestCase;
use ZfMailer\Options\ModuleOptionsFactory;
use Zend\ServiceManager\ServiceManager;

/**
 * Test for {@see \ZfMailer\Options\ModuleOptionsFactory}
 *
 * @author Daniel Wolkenhauer <hello@dw-labs.de>
 */
class ModuleOptionsFactoryTest extends TestCase
{

  /**
   * @covers ZfMailer\Options\ModuleOptionsFactory::createService
   */
  public function testCreateService()
  {

    $sm = new ServiceManager();
    $sm->setService('config', array('ZfMailer' => array()));
    $factory = new ModuleOptionsFactory();
    $moduleOptions = $factory->createService($sm);

    $this->assertInstanceOf('ZfMailer\Options\ModuleOptions', $moduleOptions);

  }

}
