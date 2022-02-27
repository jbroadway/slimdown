<?php

final class SlimdownTest extends \PHPUnit\Framework\TestCase {
	public function testRender () {
		$input_files = glob ('tests/fixtures/input/*.md');
		$expected_files = glob ('tests/fixtures/expected/*.html');

		if (count ($input_files) !== count ($expected_files)) {
			echo count ($input_files) . ' vs ' . count ($expected_files);
			die ('Input and expected file list mismatch, unable to run tests.');
		}

		sort ($input_files);
		sort ($expected_files);
		
		for ($i = 0; $i < count ($input_files); $i++) {
			$input = file_get_contents ($input_files[$i]);
			$expected = file_get_contents ($expected_files[$i]);

			static::assertSame ($expected, Slimdown::render ($input), 'Test fixture ' . basename ($input_files[$i], '.md'));
		}
	}
}
