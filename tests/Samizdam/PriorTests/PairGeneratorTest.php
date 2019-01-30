<?php

namespace Samizdam\PriorTests;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Option;
use Samizdam\Prior\Pair;
use Samizdam\Prior\PairGenerator;
use Samizdam\Prior\PairSet;

class PairGeneratorTest extends TestCase
{

	/**
	 * @dataProvider dataProvider
	 */
	public function testGeneratePairs(
		array $options,
		PairSet $expectedPairSet,
		string $caseDescription
	) {
		$generator = new PairGenerator();

		$pairSet = $generator->generatePairs($options);

		$this->assertEquals($expectedPairSet, $pairSet, $caseDescription);
	}

	public function dataProvider()
	{
		return [
			[
				[
					$optionA = new Option('a'),
					$optionB = new Option('b'),
					$optionC = new Option('c'),
				],
				new PairSet([
					$pair1 = new Pair($optionA, $optionB),
					$pair2 = new Pair($optionA, $optionC),
					$pair3 = new Pair($optionB, $optionC),
				]),
				'3 pair from 3 option',
			],
			[
				[
					$optionA = new Option('a'),
					$optionB = new Option('b'),
					$optionC = new Option('c'),
					$optionD = new Option('d'),
				],
				new PairSet([
					$pair1 = new Pair($optionA, $optionB),
					$pair2 = new Pair($optionA, $optionC),
					$pair3 = new Pair($optionA, $optionD),
					$pair4 = new Pair($optionB, $optionC),
					$pair5 = new Pair($optionB, $optionD),
					$pair6 = new Pair($optionC, $optionD),
				]),
				'6 pair from 4 option',
			],
			[
				[
					$optionA = new Option('a'),
					$optionB = new Option('b'),
					$optionC = new Option('c'),
					$optionD = new Option('d'),
					$optionE = new Option('e'),
				],
				new PairSet([
					$pair1 = new Pair($optionA, $optionB),
					$pair2 = new Pair($optionA, $optionC),
					$pair3 = new Pair($optionA, $optionD),
					$pair4 = new Pair($optionA, $optionE),
					$pair5 = new Pair($optionB, $optionC),
					$pair6 = new Pair($optionB, $optionD),
					$pair7 = new Pair($optionB, $optionE),
					$pair8 = new Pair($optionC, $optionD),
					$pair9 = new Pair($optionC, $optionE),
					$pair10 = new Pair($optionD, $optionE),
				]),
				'10 pair from 5 option',
			],
		];
	}
}
