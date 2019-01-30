<?php

namespace Samizdam\PriorTests;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\PairGenerator;
use Samizdam\Prior\Option;

class PairGeneratorTest extends TestCase
{

	public function testGeneratePairs()
	{
		$generator = new PairGenerator();

		$options = [
			$optionA = new Option('a'),
			$optionB = new Option('b'),
			$optionC = new Option('c'),
			$optionD = new Option('d'),
		];

		$pairs = $generator->generatePairs($options);
		$this->assertCount(6, $pairs);
		$pair1 = $pairs->current();
		$this->assertSame($optionA, $pair1->current());
		$pair1->next();
		$this->assertSame($optionB, $pair1->current());
		$pairs->next();
	}
}
