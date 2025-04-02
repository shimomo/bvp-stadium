# BVP Stadium

[![Build Status](https://github.com/shimomo/bvp-stadium/workflows/Tests/badge.svg)](https://github.com/shimomo/bvp-stadium/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/shimomo/bvp-stadium/graph/badge.svg?token=URL318B6CX)](https://codecov.io/gh/shimomo/bvp-stadium)
[![PHP Version Require](http://poser.pugx.org/bvp/stadium/require/php)](https://packagist.org/packages/bvp/stadium)
[![Latest Stable Version](https://poser.pugx.org/bvp/stadium/v/stable)](https://packagist.org/packages/bvp/stadium)
[![Latest Unstable Version](https://poser.pugx.org/bvp/stadium/v/unstable)](https://packagist.org/packages/bvp/stadium)
[![License](https://poser.pugx.org/bvp/stadium/license)](https://packagist.org/packages/bvp/stadium)

The BVP Stadium package is designed to retrieve information about Boatrace stadiums using identifiers, including Number, Name (Short, Hiragana, Katakana, English), and URL.

## Installation
```bash
composer require bvp/stadium
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Stadium\Stadium;

$response = Stadium::byNumber(12);
var_dump($response['number']);        // int(12)
var_dump($response['name']);          // string(27) "ボートレース住之江"
var_dump($response['short_name']);    // string(9) "住之江"
var_dump($response['hiragana_name']); // string(30) "ぼーとれーすすみのえ"
var_dump($response['katakana_name']); // string(30) "ボートレーススミノエ"
var_dump($response['english_name']);  // string(7) "suminoe"
var_dump($response['url']);           // string(32) "https://www.boatrace-suminoe.jp/"

$response = Stadium::byName('ボートレース住之江');
var_dump($response['number']);        // int(12)
var_dump($response['name']);          // string(27) "ボートレース住之江"
var_dump($response['short_name']);    // string(9) "住之江"
var_dump($response['hiragana_name']); // string(30) "ぼーとれーすすみのえ"
var_dump($response['katakana_name']); // string(30) "ボートレーススミノエ"
var_dump($response['english_name']);  // string(7) "suminoe"
var_dump($response['url']);           // string(32) "https://www.boatrace-suminoe.jp/"

$response = Stadium::byShortName('住之江');
var_dump($response['number']);        // int(12)
var_dump($response['name']);          // string(27) "ボートレース住之江"
var_dump($response['short_name']);    // string(9) "住之江"
var_dump($response['hiragana_name']); // string(30) "ぼーとれーすすみのえ"
var_dump($response['katakana_name']); // string(30) "ボートレーススミノエ"
var_dump($response['english_name']);  // string(7) "suminoe"
var_dump($response['url']);           // string(32) "https://www.boatrace-suminoe.jp/"

$response = Stadium::byHiraganaName('すみのえ');
var_dump($response['number']);        // int(12)
var_dump($response['name']);          // string(27) "ボートレース住之江"
var_dump($response['short_name']);    // string(9) "住之江"
var_dump($response['hiragana_name']); // string(30) "ぼーとれーすすみのえ"
var_dump($response['katakana_name']); // string(30) "ボートレーススミノエ"
var_dump($response['english_name']);  // string(7) "suminoe"
var_dump($response['url']);           // string(32) "https://www.boatrace-suminoe.jp/"

$response = Stadium::byKatakanaName('スミノエ');
var_dump($response['number']);        // int(12)
var_dump($response['name']);          // string(27) "ボートレース住之江"
var_dump($response['short_name']);    // string(9) "住之江"
var_dump($response['hiragana_name']); // string(30) "ぼーとれーすすみのえ"
var_dump($response['katakana_name']); // string(30) "ボートレーススミノエ"
var_dump($response['english_name']);  // string(7) "suminoe"
var_dump($response['url']);           // string(32) "https://www.boatrace-suminoe.jp/"

$response = Stadium::byEnglishName('suminoe');
var_dump($response['number']);        // int(12)
var_dump($response['name']);          // string(27) "ボートレース住之江"
var_dump($response['short_name']);    // string(9) "住之江"
var_dump($response['hiragana_name']); // string(30) "ぼーとれーすすみのえ"
var_dump($response['katakana_name']); // string(30) "ボートレーススミノエ"
var_dump($response['english_name']);  // string(7) "suminoe"
var_dump($response['url']);           // string(32) "https://www.boatrace-suminoe.jp/"

$response = Stadium::byUrl('suminoe');
var_dump($response['number']);        // int(12)
var_dump($response['name']);          // string(27) "ボートレース住之江"
var_dump($response['short_name']);    // string(9) "住之江"
var_dump($response['hiragana_name']); // string(30) "ぼーとれーすすみのえ"
var_dump($response['katakana_name']); // string(30) "ボートレーススミノエ"
var_dump($response['english_name']);  // string(7) "suminoe"
var_dump($response['url']);           // string(32) "https://www.boatrace-suminoe.jp/"
```

## License
The BVP Stadium package is open source software licensed under the [MIT license](LICENSE).
