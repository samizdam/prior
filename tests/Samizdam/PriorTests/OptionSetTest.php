<?php

namespace Samizdam\PriorTests;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Option;
use Samizdam\Prior\OptionSet;

class OptionSetTest extends TestCase
{

	public function testGetOptions()
	{
		$set = new OptionSet();
		$optionA = new Option('foo');
		$set->addOption($optionA);
		$optionB = new Option('bar');

		$this->assertContains($optionA, $set->getOptions());
		$this->assertNotContains($optionB, $set->getOptions());
	}

	public function testGetOptions_in_order()
	{
		$set = new OptionSet();
		$optionA = new Option('a');
		$optionA->addVote();

		$optionB = new Option('b');
		$optionB->addVote();
		$optionB->addVote();
		$optionB->addVote();

		$optionC = new Option('c');
		$optionC->addVote();
		$optionC->addVote();

		$set->addOption($optionA);
		$set->addOption($optionB);
		$set->addOption($optionC);

		$options = $set->getOptions();

		$this->assertSame($optionB, $options->current());
		$options->next();
		$this->assertSame($optionC, $options->current());
		$options->next();
		$this->assertSame($optionA, $options->current());
	}

}
