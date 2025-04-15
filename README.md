# BVP Stadium

[![Build Status](https://github.com/shimomo/bvp-stadium/workflows/Tests/badge.svg)](https://github.com/shimomo/bvp-stadium/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/shimomo/bvp-stadium/graph/badge.svg?token=URL318B6CX)](https://codecov.io/gh/shimomo/bvp-stadium)
[![PHP Version Require](https://poser.pugx.org/bvp/stadium/require/php)](https://packagist.org/packages/bvp/stadium)
[![Latest Stable Version](https://poser.pugx.org/bvp/stadium/v/stable)](https://packagist.org/packages/bvp/stadium)
[![Latest Unstable Version](https://poser.pugx.org/bvp/stadium/v/unstable)](https://packagist.org/packages/bvp/stadium)
[![License](https://poser.pugx.org/bvp/stadium/license)](https://packagist.org/packages/bvp/stadium)

The BVP Stadium package provides structured data about all Japanese boatrace stadiums, including their names in various scripts (Kanji, Hiragana, Katakana, English), url information, and identifier numbers.

## Installation
```bash
composer require bvp/stadium
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Stadium\Stadium;

/**
 * @return array
 */
$stadium = Stadium::byNumber(12);
// or $stadium = Stadium::byNumber([12]);

print_r($stadium);

/*------------------------------
Array
(
    [number] => 12
    [name] => ボートレース住之江
    [short_name] => 住之江
    [hiragana_name] => ぼーとれーすすみのえ
    [katakana_name] => ボートレーススミノエ
    [english_name] => suminoe
    [url] => https://www.boatrace-suminoe.jp/
)
------------------------------*/

/**
 * @return array
 */
$stadium = Stadium::byName('ボートレース住之江');
// or $stadium = Stadium::byName(['ボートレース住之江']);

/**
 * @return array
 */
$stadium = Stadium::byShortName('住之江');
// or $stadium = Stadium::byShortName(['住之江']);

/**
 * @return array
 */
$stadium = Stadium::byHiraganaName('すみのえ');
// or $stadium = Stadium::byHiraganaName(['すみのえ']);

/**
 * @return array
 */
$stadium = Stadium::byKatakanaName('スミノエ');
// or $stadium = Stadium::byKatakanaName(['スミノエ']);

/**
 * @return array
 */
$stadium = Stadium::byEnglishName('suminoe');
// or $stadium = Stadium::byEnglishName(['suminoe']);

/**
 * @return array
 */
$stadium = Stadium::byUrl('suminoe');
// or $stadium = Stadium::byUrl(['suminoe']);
```

## License
The BVP Stadium package is open source software licensed under the [MIT license](LICENSE).
