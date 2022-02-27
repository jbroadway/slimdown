<?php

final class SlimdownTest extends \PHPUnit\Framework\TestCase {
	public function testRender () {
		// Single line tests
		static::assertSame ('<p>Foo</p>', Slimdown::render ('Foo'));
		static::assertSame ('<h1>Foo</h1>', Slimdown::render ('# Foo'));
		static::assertSame ('<h2>Foo</h2>', Slimdown::render ('## Foo'));
		
		// Heading, paragraph, bold and italics
		static::assertSame (
			"<h1>Page title</h1>\n\n<p>And <strong>now</strong> for something <em>completely</em> different.</p>",
			Slimdown::render ("# Page title\n\nAnd **now** for something _completely_ different.")
		);

		// Links
		static::assertSame (
			"<p>A <a href='http://www.google.com'>link</a> and <a href='http://yahoo.com/'>another link</a>.</p>",
			Slimdown::render ("A [link](http://www.google.com) and [another link](http://yahoo.com/).")
		);
	}
}
