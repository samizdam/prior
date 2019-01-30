<?php

namespace Samizdam\PriorTests;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Option;
use Samizdam\Prior\Pair;

class PairTest extends TestCase
{

	public function testNext()
	{
		$optionA = new Option('a');
		$optionB = new Option('b');
		$pair = new Pair($optionA, $optionB);

		$this->assertSame($optionA, $pair->current());
		$pair->next();
		$this->assertSame($optionB, $pair->current());
	}

}
