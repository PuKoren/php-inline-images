# inline-images
[![Latest Stable Version](https://poser.pugx.org/koren/inline-images/v/stable)](https://packagist.org/packages/koren/inline-images)
[![Build Status](https://travis-ci.org/PuKoren/php-inline-images.svg?branch=master)](https://travis-ci.org/PuKoren/php-inline-images)
[![codecov](https://codecov.io/gh/PuKoren/php-inline-images/branch/master/graph/badge.svg)](https://codecov.io/gh/PuKoren/php-inline-images)
[![Code Climate](https://codeclimate.com/github/PuKoren/php-inline-images/badges/gpa.svg)](https://codeclimate.com/github/PuKoren/php-inline-images)
[![Total Downloads](https://poser.pugx.org/koren/inline-images/downloads)](https://packagist.org/packages/koren/inline-images)

A PHP lib to handle image inlining in your (css, img src, etc.)

# Install
```bash
composer require koren/inline-images
```

# Convert an image to an inline string value

```php
<?php

$inliner = new InlineImages\Converter('/path/to/img.png');

echo '<img src="'.$inliner->convert().'"/>';
//or for css
echo 'background: url('.$inliner->convert().')';

```

# Convert a remote image to inline string value
```php
<?php

$inliner = new InlineImages\Converter('http://path/to/img.png');

echo '<img src="'.$inliner->convert().'"/>';
//or for css
echo 'background: url('.$inliner->convert().')';

```

# Inline SVGs
```php
<?php

$inliner = new InlineImages\Converter('/path/to/img.svg');

echo '<img src="'.$inliner->convert().'"/>';
//or for css
echo 'background: url('.$inliner->convert().')';

```