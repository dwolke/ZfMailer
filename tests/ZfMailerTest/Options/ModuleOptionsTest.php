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

	/**
	 * @covers  ZfMailer\Options\ModuleOptions::getReturnPath
	 * @covers  ZfMailer\Options\ModuleOptions::setReturnPath
	 */
	public function testSetGetReturnPath()
	{
		$this->options->setReturnPath('Return-Path');
		$this->assertEquals('Return-Path', $this->options->getReturnPath());
	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getReturnPath
	 */
	public function testGetReturnPath()
	{
		$this->assertEquals('', $this->options->getReturnPath());
	}

	/**
	 * @covers  ZfMailer\Options\ModuleOptions::getReplyTo
	 * @covers  ZfMailer\Options\ModuleOptions::setReplyTo
	 */
	public function testSetGetReplyTo()
	{
		$this->options->setReplyTo('Antwort-An');
		$this->assertEquals('Antwort-An', $this->options->getReplyTo());
	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getReplyTo
	 */
	public function testGetReplyTo()
	{
		$this->assertEquals('', $this->options->getReplyTo());
	}

	/**
	 * @covers  ZfMailer\Options\ModuleOptions::getXMailer
	 * @covers  ZfMailer\Options\ModuleOptions::setXMailer
	 */
	public function testSetGetXMailer()
	{
		$this->options->setXMailer('super duper mailer');
		$this->assertEquals('super duper mailer', $this->options->getXMailer());
	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getXMailer
	 */
	public function testGetXMailer()
	{
		$this->assertEquals('ZfMailer 1.0.1', $this->options->getXMailer());
	}

	/**
	 * @covers  ZfMailer\Options\ModuleOptions::getOrganization
	 * @covers  ZfMailer\Options\ModuleOptions::setOrganization
	 */
	public function testSetGetOrganization()
	{
		$this->options->setOrganization('ACME Corp.');
		$this->assertEquals('ACME Corp.', $this->options->getOrganization());
	}

	/**
	 * @covers ZfMailer\Options\ModuleOptions::getOrganization
	 */
	public function testOrganization()
	{
		$this->assertEquals('', $this->options->getOrganization());
	}

}
