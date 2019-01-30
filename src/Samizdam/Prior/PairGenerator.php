<?php

namespace Samizdam\Prior;

class PairGenerator
{

	public function generatePairs(array $options): PairSet
	{
		$pairs = [];
		$numberOfPairs = $this->getNumberOfPairs($options);

		for ($i = 0; $i++ < $numberOfPairs;) {
			$pairs[] = new Pair($options[0], $options[1]);
		}

		return new PairSet($pairs);
	}

	private function getNumberOfPairs(array $options)
	{
		// Ckn=n! / ((n−k)!⋅k!)
		$n = count($options);
		$k = 2;
		return factorial($n) / (factorial($n - $k) * factorial($k));
	}


}

function factorial($n)
{
	return ($n !== 1) ? $n * factorial($n - 1) : 1;
}
