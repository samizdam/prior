<?php

namespace Samizdam\Prior;

class Option
{

	/**
	 * @var mixed
	 */
	private $value;

	public function __construct($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}
}
