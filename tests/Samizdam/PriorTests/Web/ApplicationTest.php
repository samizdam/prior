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

	public function testRenderProgressPage()
	{
		$app = new Application();

		$progressData = [
			[
				'value' => 'a',
			],
			[
				'value' => 'b',
			],
		];
		$this->assertStringContainsString(<<<HTML
		<label><input type="radio" value="a"/></label>
		<label><input type="radio" value="b"/></label>
HTML
		, $app->renderProgressPage($progressData));
	}

}
