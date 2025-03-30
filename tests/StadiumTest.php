<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\Stadium;
use BVP\Stadium\StadiumInterface;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumTest extends TestCase
{
    /**
     * @return void
     */
    public function testByNumber(): void
    {
        $response = Stadium::byNumber(12);
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
        $response = Stadium::byName('ボートレース住之江');
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
        $response = Stadium::byShortName('住之江');
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
        $response = Stadium::byHiraganaName('すみのえ');
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
        $response = Stadium::byKatakanaName('スミノエ');
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
        $response = Stadium::byEnglishName('suminoe');
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
        $response = Stadium::byUrl('suminoe');
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
            "BVP\Stadium\StadiumCore::__call() - " .
            "The specified method 'invalid' does not exist in class 'BVP\Stadium\StadiumCore'"
        );

        Stadium::invalid();
    }

    /**
     * @return void
     */
    public function testGetInstance(): void
    {
        Stadium::resetInstance();
        $this->assertInstanceOf(StadiumInterface::class, Stadium::getInstance());
    }

    /**
     * @return void
     */
    public function testCreateInstance(): void
    {
        Stadium::resetInstance();
        $this->assertInstanceOf(StadiumInterface::class, Stadium::createInstance());
    }

    /**
     * @return void
     */
    public function testResetInstance(): void
    {
        Stadium::resetInstance();
        $instance1 = Stadium::getInstance();
        Stadium::resetInstance();
        $instance2 = Stadium::getInstance();
        $this->assertNotSame($instance1, $instance2);
    }
}
