<?php

namespace Samizdam\PriorTests\Web;

use PHPUnit\Framework\TestCase;
use Samizdam\Prior\Option;
use Samizdam\Prior\Pair;
use Samizdam\Prior\PairSet;
use Samizdam\Prior\Web\Application;

class ApplicationTest extends TestCase
{

	public function testRenderInitialPage()
	{
		$app = new Application();

		$this->assertSame(file_get_contents(__DIR__ . '/../../../../view/index.html'), $app->renderInitialPage());
	}

	public function testRenderProgressPage()
	{
		$app = new Application();

		$pairSet = new PairSet([new Pair(new Option('a'), new Option('b'))]);
		$this->assertStringContainsString(<<<HTML
		<form method="post" action="/progress">
			<label><input type="radio" name="vote" value="a"/>a</label>
			<label><input type="radio" name="vote" value="b"/>b</label>
			<input type="submit"/>
		</form>
HTML
			, $app->renderProgressPage($pairSet));
	}

}
