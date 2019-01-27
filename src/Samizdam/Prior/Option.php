<?php

namespace Samizdam\Prior;

class Option
{

	/**
	 * @var mixed
	 */
	private $value;
	/**
	 * @var int
	 */
	private $vote = 0;

	public function __construct($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function getVote(): int
	{
		return $this->vote;
	}

	public function addVote(): void
	{
		$this->vote++;
	}
}
