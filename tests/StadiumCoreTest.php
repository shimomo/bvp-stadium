<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\StadiumCore;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumCoreTest extends TestCase
{
    /**
     * @var \BVP\Stadium\StadiumCore
     */
    protected StadiumCore $stadium;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->stadium = new StadiumCore();
    }

    /**
     * @return void
     */
    public function testByNumber(): void
    {
        $response = $this->stadium->byNumber(12);
        $this->assertSame(12, $response['number']);
        $this->assertSame('ボートレース住之江', $response['name']);
        $this->assertSame('住之江', $response['short_name']);
        $this->assertSame('ぼーとれーすすみのえ', $response['hiragana_name']);
        $this->assertSame('ボートレーススミノエ', $response['katakana_name']);
        $this->assertSame('suminoe', $response['english_name']);
        $this->assertSame('https://www.boatrace-suminoe.jp/', $response['url']);
    }

    /**
     * @return void
     */
    public function testByName(): void
    {
        $response = $this->stadium->byName('ボートレース住之江');
        $this->assertSame(12, $response['number']);
        $this->assertSame('ボートレース住之江', $response['name']);
        $this->assertSame('住之江', $response['short_name']);
        $this->assertSame('ぼーとれーすすみのえ', $response['hiragana_name']);
        $this->assertSame('ボートレーススミノエ', $response['katakana_name']);
        $this->assertSame('suminoe', $response['english_name']);
        $this->assertSame('https://www.boatrace-suminoe.jp/', $response['url']);
    }

    /**
     * @return void
     */
    public function testByShortName(): void
    {
        $response = $this->stadium->byShortName('住之江');
        $this->assertSame(12, $response['number']);
        $this->assertSame('ボートレース住之江', $response['name']);
        $this->assertSame('住之江', $response['short_name']);
        $this->assertSame('ぼーとれーすすみのえ', $response['hiragana_name']);
        $this->assertSame('ボートレーススミノエ', $response['katakana_name']);
        $this->assertSame('suminoe', $response['english_name']);
        $this->assertSame('https://www.boatrace-suminoe.jp/', $response['url']);
    }

    /**
     * @return void
     */
    public function testByHiraganaName(): void
    {
        $response = $this->stadium->byHiraganaName('すみのえ');
        $this->assertSame(12, $response['number']);
        $this->assertSame('ボートレース住之江', $response['name']);
        $this->assertSame('住之江', $response['short_name']);
        $this->assertSame('ぼーとれーすすみのえ', $response['hiragana_name']);
        $this->assertSame('ボートレーススミノエ', $response['katakana_name']);
        $this->assertSame('suminoe', $response['english_name']);
        $this->assertSame('https://www.boatrace-suminoe.jp/', $response['url']);
    }

    /**
     * @return void
     */
    public function testByKatakanaName(): void
    {
        $response = $this->stadium->byKatakanaName('スミノエ');
        $this->assertSame(12, $response['number']);
        $this->assertSame('ボートレース住之江', $response['name']);
        $this->assertSame('住之江', $response['short_name']);
        $this->assertSame('ぼーとれーすすみのえ', $response['hiragana_name']);
        $this->assertSame('ボートレーススミノエ', $response['katakana_name']);
        $this->assertSame('suminoe', $response['english_name']);
        $this->assertSame('https://www.boatrace-suminoe.jp/', $response['url']);
    }

    /**
     * @return void
     */
    public function testByEnglishName(): void
    {
        $response = $this->stadium->byEnglishName('suminoe');
        $this->assertSame(12, $response['number']);
        $this->assertSame('ボートレース住之江', $response['name']);
        $this->assertSame('住之江', $response['short_name']);
        $this->assertSame('ぼーとれーすすみのえ', $response['hiragana_name']);
        $this->assertSame('ボートレーススミノエ', $response['katakana_name']);
        $this->assertSame('suminoe', $response['english_name']);
        $this->assertSame('https://www.boatrace-suminoe.jp/', $response['url']);
    }

    /**
     * @return void
     */
    public function testByUrl(): void
    {
        $response = $this->stadium->byUrl('suminoe');
        $this->assertSame(12, $response['number']);
        $this->assertSame('ボートレース住之江', $response['name']);
        $this->assertSame('住之江', $response['short_name']);
        $this->assertSame('ぼーとれーすすみのえ', $response['hiragana_name']);
        $this->assertSame('ボートレーススミノエ', $response['katakana_name']);
        $this->assertSame('suminoe', $response['english_name']);
        $this->assertSame('https://www.boatrace-suminoe.jp/', $response['url']);
    }

    /**
     * @return void
     */
    public function testException(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Stadium\StadiumCore::resolveMethod() - " .
            "The specified method 'invalid' does not exist in class 'BVP\Stadium\StadiumCore'"
        );

        $this->stadium->invalid();
    }
}
