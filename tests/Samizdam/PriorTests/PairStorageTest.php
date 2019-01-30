<?php

namespace Samizdam\PriorTests;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Option;
use Samizdam\Prior\Pair;
use Samizdam\Prior\PairStorage;

class PairStorageTest extends TestCase
{

	public function testNext()
	{
		$optionA = new Option('a');
		$optionB = new Option('b');
		$pair1 = new Pair($optionA, $optionB);
		$optionC = new Option('c');
		$optionD = new Option('d');
		$pair2 = new Pair($optionC, $optionD);

		$pairs = [$pair1, $pair2];

		$pairStorage = new PairStorage($pairs);
		$this->assertSame($pair1, $pairStorage->current());
		$pairStorage->next();
		$this->assertSame($pair2, $pairStorage->current());
	}
}
