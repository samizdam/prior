<?php

namespace Samizdam\Prior;

class OptionsSet
{

	private $options;

	public function __construct()
	{
		$this->options = new \SplPriorityQueue();
	}

	public function addOption(Option $option)
	{
		$this->options->insert($option, $option->getVote());
	}

	public function getOptions(): \Iterator
	{
		return $this->options;
	}
}
