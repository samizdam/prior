<?php

namespace Samizdam\Prior\Web;

class Application
{

	public function renderInitialPage(): string
	{
		return file_get_contents(__DIR__ . '/../../../../view/index.html');
	}

	public function renderProgressPage(array $progressData)
	{
		list($a, $b) = $progressData;
		return <<<HTML
		<label><input type="radio" value="${a['value']}"/></label>
		<label><input type="radio" value="${b['value']}"/></label>
HTML;
	}
}
