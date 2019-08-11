<?php

namespace ZfMailerTest\Options;

use PHPUnit\Framework\TestCase;
use ZfMailer\Options\ModuleOptions as Options;

class ModuleOptionsTest extends TestCase
{

	/**
	 * @var Options $options
   */
	protected $options;

	public function setUp()
	{
		$options = new Options;
		$this->options = $options;
	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getSmartHost
	 * @covers ZfMailer\Options\ModuleOptions::setSmartHost
	 */
	public function testSetGetSmartHost()
	{

		$expected = array(
			'some_option' => 'Foo',
			'another_option' => 1234,
			'more_option' => null
		);

		$this->options->setSmartHost($expected);

		$this->assertIsArray($this->options->getSmartHost());
		$this->assertEquals($expected, $this->options->getSmartHost());

	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getSmartHost
	 */
	public function testGetSmartHost()
	{

		$this->assertIsArray($this->options->getSmartHost());

		$expected = array(
			'server_name' => 'mx.mail-domain.com',
			'server_port' => 25,
			'username'    => 'username',
			'password'    => 'password'
		);

		$this->assertEquals($expected, $this->options->getSmartHost());

	}

	/**
   * @covers ZfMailer\Options\ModuleOptions::getEncoding
   * @covers ZfMailer\Options\ModuleOptions::setEncoding
   */
	public function testSetGetEncoding()
	{
		$this->options->setEncoding('UTF-36');
		$this->assertEquals('UTF-36', $this->options->getEncoding());
	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getEncoding
   */
	public function testGetEncoding()
	{
		$this->assertEquals('UTF-8', $this->options->getEncoding());
	}

	/**
	 * @covers  ZfMailer\Options\ModuleOptions::getDefaultFrom
	 * @covers  ZfMailer\Options\ModuleOptions::setDefaultFrom
	 */
	public function testSetGetDefaultFrom()
	{
		$this->options->setDefaultFrom('Absender');
		$this->assertEquals('Absender', $this->options->getDefaultFrom());
	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getDefaultFrom
	 */
	public function testGetDefaultFrom()
	{
		$this->assertEquals('', $this->options->getDefaultFrom());
	}








}
