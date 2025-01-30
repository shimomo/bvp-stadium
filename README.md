# Stadium

[![Build Status](https://github.com/BoatraceVentureProject/Stadium/workflows/Tests/badge.svg)](https://github.com/BoatraceVentureProject/Stadium/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/BoatraceVentureProject/Stadium/graph/badge.svg?token=RJmoRn6NXp)](https://codecov.io/gh/BoatraceVentureProject/Stadium)
[![Latest Stable Version](https://poser.pugx.org/bvp/stadium/v/stable)](https://packagist.org/packages/bvp/stadium)
[![Latest Unstable Version](https://poser.pugx.org/bvp/stadium/v/unstable)](https://packagist.org/packages/bvp/stadium)
[![License](https://poser.pugx.org/bvp/stadium/license)](https://packagist.org/packages/bvp/stadium)

Stadium is designed to retrieve information about Boatrace's stadiums using identifiers such as id, name, short name, hiragana name, katakana name, english name, or url.

## Installation
```bash
composer require bvp/stadium
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Venture\Project\Stadium;

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
The Stadium is open source software licensed under the [MIT license](LICENSE).
