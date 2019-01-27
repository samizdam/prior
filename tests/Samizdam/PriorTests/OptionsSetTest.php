<?php

namespace Samizdam\PriorTests;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Option;
use Samizdam\Prior\OptionsSet;

class OptionsSetTest extends TestCase
{

	public function testGetOptions()
	{
		$set = new OptionsSet();
		$optionA = new Option('a');
		$set->addOption($optionA);
		$optionB = new Option('bar');

		$this->assertContains($optionA, $set->getOptions());
		$this->assertNotContains($optionB, $set->getOptions());
	}

}
