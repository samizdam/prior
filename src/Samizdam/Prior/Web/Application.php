<?php

namespace Samizdam\Prior\Web;

use Samizdam\Prior\PairSet;

class Application
{

	public function renderInitialPage(): string
	{
		return file_get_contents(__DIR__ . '/../../../../view/index.html');
	}

	public function renderProgressPage(PairSet $progressData)
	{
		$currentPair = $progressData->current();
		$optionA = $currentPair->current();
		$currentPair->next();
		$optionB = $currentPair->current();
		$valueA = $optionA->getValue();
		$valueB = $optionB->getValue();

		return <<<HTML
		<form method="post" action="/progress">
			<label><input type="radio" name="vote" value="${valueA}"/>${valueA}</label>
			<label><input type="radio" name="vote" value="${valueB}"/>${valueB}</label>
			<input type="submit"/>
		</form>
HTML;
	}
}
