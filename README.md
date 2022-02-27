# Slimdown

![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/jbroadway/slimdown/Continuous%20Integration/master)
![Packagist License](https://img.shields.io/packagist/l/jbroadway/slimdown)
![Packagist Version](https://img.shields.io/packagist/v/jbroadway/slimdown)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/jbroadway/slimdown)
![Packagist Downloads](https://img.shields.io/packagist/dt/jbroadway/slimdown)

A simple regex-based Markdown parser in PHP. Supports the
following elements (and can be extended via `Slimdown::add_rule()`):

* Headers
* Links
* Bold
* Emphasis
* Deletions
* Quotes
* Code blocks
* Inline code
* Blockquotes
* Ordered/unordered lists

Originally hosted as a [gist here](https://gist.github.com/jbroadway/2836900).

## Usage

Here is the general use case:

```php
<?php

require_once ('Slimdown.php');

echo Slimdown::render (
	"# Page title\n\nAnd **now** for something _completely_ different."
);
```

Or via [composer](https://getcomposer.org/):

```
composer require jbroadway/slimdown
```

Then:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

echo Slimdown::render (
	"# Page title\n\nAnd **now** for something _completely_ different."
);
```

### Adding rules

A simple rule to convert `:)` to an image:

```php
<?php

Slimdown::add_rule ('/(\W)\:\)(\W)/', '\1<img src="smiley.png" />\2');

echo Slimdown::render ('Know what I\'m sayin? :)');
```

In this example, we add GitHub-style internal linking
(e.g., `[[Another Page]]`).

```php
<?[j[]]

function mywiki_internal_link ($title) {
	return sprintf (
		'<a href="%s">%s</a>',
		preg_replace ('/[^a-zA-Z0-9_-]+/', '-', $title),
		$title
	);
}

Slimdown::add_rule ('/\[\[(.*?)\]\]/e', 'mywiki_internal_link (\'\\1\')');

echo Slimdown::render ('Check [[This Page]] out!');
```

### A longer example

```php
<?php

echo Slimdown::render ("# Title

And *now* [a link](http://www.google.com) to **follow** and [another](http://yahoo.com/).

* One
* Two
* Three

## Subhead

One **two** three **four** five.

One __two__ three _four_ five __six__ seven _eight_.

1. One
2. Two
3. Three

More text with `inline($code)` sample.

> A block quote
> across two lines.

More text...");
```
