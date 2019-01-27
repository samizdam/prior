<?php

namespace Samizdam\PriorTests\Web;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Web\Application;

class ApplicationTest extends TestCase
{

	public function testRenderInitialPage()
	{
		$app = new Application();

		$this->assertSame(file_get_contents(__DIR__ .'/../../../../view/index.html'), $app->renderInitialPage());
	}

}
