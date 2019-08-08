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

}
