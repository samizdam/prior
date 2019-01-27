<?php

namespace Samizdam\Prior\Web;

class Application
{

	public function renderInitialPage(): string
	{
		return file_get_contents(__DIR__ . '/../../../../view/index.html');
	}
}
