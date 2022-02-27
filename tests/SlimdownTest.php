<?php

final class SlimdownTest extends \PHPUnit\Framework\TestCase {
	public function testRender () {
		static::assertSame ('<h1>Foo</h1>', Slimdown::render ('# Foo'));
		static::assertSame ('<h2>Foo</h2>', Slimdown::render ('## Foo'));
	}
}
