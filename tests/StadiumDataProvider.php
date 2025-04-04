<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

/**
 * @author shimomo
 */
final class StadiumDataProvider
{
    /**
     * @return array
     */
    public static function byNumberProvider(): array
    {
        return [
            [
                'arguments' => [12],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [[12]],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byNameProvider(): array
    {
        return [
            [
                'arguments' => ['ボートレース住之江'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['ボートレース住之江']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byShortNameProvider(): array
    {
        return [
            [
                'arguments' => ['住之江'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['住之江']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byHiraganaNameProvider(): array
    {
        return [
            [
                'arguments' => ['ぼーとれーすすみのえ'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['ぼーとれーすすみのえ']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byKatakanaNameProvider(): array
    {
        return [
            [
                'arguments' => ['ボートレーススミノエ'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['ボートレーススミノエ']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byEnglishNameProvider(): array
    {
        return [
            [
                'arguments' => ['suminoe'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['suminoe']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function byUrlProvider(): array
    {
        return [
            [
                'arguments' => ['suminoe'],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
            [
                'arguments' => [['suminoe']],
                'expected' => [
                    'number' => 12,
                    'name' => 'ボートレース住之江',
                    'short_name' => '住之江',
                    'hiragana_name' => 'ぼーとれーすすみのえ',
                    'katakana_name' => 'ボートレーススミノエ',
                    'english_name' => 'suminoe',
                    'url' => 'https://www.boatrace-suminoe.jp/',
                ],
            ],
        ];
    }
}
