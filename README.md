# Stadium

[![Build Status](https://github.com/BoatraceVentureProject/Stadium/workflows/Tests/badge.svg)](https://github.com/BoatraceVentureProject/Stadium/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/BoatraceVentureProject/Stadium/graph/badge.svg?token=RJmoRn6NXp)](https://codecov.io/gh/BoatraceVentureProject/Stadium)
[![Latest Stable Version](https://poser.pugx.org/bvp/stadium/v/stable)](https://packagist.org/packages/bvp/stadium)
[![Latest Unstable Version](https://poser.pugx.org/bvp/stadium/v/unstable)](https://packagist.org/packages/bvp/stadium)
[![License](https://poser.pugx.org/bvp/stadium/license)](https://packagist.org/packages/bvp/stadium)

The BVP Stadium package is designed to retrieve information about Boatrace stadiums using identifiers, including ID, name (short, Hiragana, Katakana, English), and URL.

## Installation
```bash
composer require bvp/stadium
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Stadium\Stadium;

$collection = Stadium::byId(12);
var_dump($collection->get('id'));            // int(12)
var_dump($collection->get('name'));          // string(27) "ボートレース住之江"
var_dump($collection->get('short_name'));    // string(9) "住之江"
var_dump($collection->get('hiragana_name')); // string(30) "ぼーとれーすすみのえ"
var_dump($collection->get('katakana_name')); // string(30) "ボートレーススミノエ"
var_dump($collection->get('english_name'));  // string(7) "suminoe"
var_dump($collection->get('url'));           // string(32) "https://www.boatrace-suminoe.jp/"

$collection = Stadium::byName('ボートレース住之江');
var_dump($collection->get('id'));            // int(12)
var_dump($collection->get('name'));          // string(27) "ボートレース住之江"
var_dump($collection->get('short_name'));    // string(9) "住之江"
var_dump($collection->get('hiragana_name')); // string(30) "ぼーとれーすすみのえ"
var_dump($collection->get('katakana_name')); // string(30) "ボートレーススミノエ"
var_dump($collection->get('english_name'));  // string(7) "suminoe"
var_dump($collection->get('url'));           // string(32) "https://www.boatrace-suminoe.jp/"

$collection = Stadium::byShortName('住之江');
var_dump($collection->get('id'));            // int(12)
var_dump($collection->get('name'));          // string(27) "ボートレース住之江"
var_dump($collection->get('short_name'));    // string(9) "住之江"
var_dump($collection->get('hiragana_name')); // string(30) "ぼーとれーすすみのえ"
var_dump($collection->get('katakana_name')); // string(30) "ボートレーススミノエ"
var_dump($collection->get('english_name'));  // string(7) "suminoe"
var_dump($collection->get('url'));           // string(32) "https://www.boatrace-suminoe.jp/"

$collection = Stadium::byUrl('suminoe');
var_dump($collection->get('id'));            // int(12)
var_dump($collection->get('name'));          // string(27) "ボートレース住之江"
var_dump($collection->get('short_name'));    // string(9) "住之江"
var_dump($collection->get('hiragana_name')); // string(30) "ぼーとれーすすみのえ"
var_dump($collection->get('katakana_name')); // string(30) "ボートレーススミノエ"
var_dump($collection->get('english_name'));  // string(7) "suminoe"
var_dump($collection->get('url'));           // string(32) "https://www.boatrace-suminoe.jp/"
```

## License
The BVP Stadium package is open source software licensed under the [MIT license](LICENSE).
