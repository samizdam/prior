<?php

namespace Samizdam\PriorTests;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Option;

class OptionTest extends TestCase
{

	public function testEquals_positive()
	{
		$optionA = new Option('a');
		$optionB = new Option('b');

		$this->assertNotEquals($optionA, $optionB);
	}

	public function testEquals_negative()
	{
		$optionA = new Option('a');
		$optionA2 = new Option('a');

		$this->assertEquals($optionA, $optionA2);
	}

	public function testGetValue()
	{
		$option = new Option('foo');

		$this->assertSame('foo', $option->getValue());
	}
}
