<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\Stadium;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class StadiumTest extends PHPUnitTestCase
{
    /**
     * @return void
     */
    public function testById(): void
    {
        $collection = Stadium::byId(12);
        $this->assertSame(12, $collection->get('id'));
        $this->assertSame('ボートレース住之江', $collection->get('name'));
        $this->assertSame('住之江', $collection->get('short_name'));
        $this->assertSame('ぼーとれーすすみのえ', $collection->get('hiragana_name'));
        $this->assertSame('ボートレーススミノエ', $collection->get('katakana_name'));
        $this->assertSame('suminoe', $collection->get('english_name'));
        $this->assertSame('https://www.boatrace-suminoe.jp/', $collection->get('url'));
    }

    /**
     * @return void
     */
    public function testByName(): void
    {
        $collection = Stadium::byName('ボートレース住之江');
        $this->assertSame(12, $collection->get('id'));
        $this->assertSame('ボートレース住之江', $collection->get('name'));
        $this->assertSame('住之江', $collection->get('short_name'));
        $this->assertSame('ぼーとれーすすみのえ', $collection->get('hiragana_name'));
        $this->assertSame('ボートレーススミノエ', $collection->get('katakana_name'));
        $this->assertSame('suminoe', $collection->get('english_name'));
        $this->assertSame('https://www.boatrace-suminoe.jp/', $collection->get('url'));
    }

    /**
     * @return void
     */
    public function testByShortName(): void
    {
        $collection = Stadium::byShortName('住之江');
        $this->assertSame(12, $collection->get('id'));
        $this->assertSame('ボートレース住之江', $collection->get('name'));
        $this->assertSame('住之江', $collection->get('short_name'));
        $this->assertSame('ぼーとれーすすみのえ', $collection->get('hiragana_name'));
        $this->assertSame('ボートレーススミノエ', $collection->get('katakana_name'));
        $this->assertSame('suminoe', $collection->get('english_name'));
        $this->assertSame('https://www.boatrace-suminoe.jp/', $collection->get('url'));
    }

    /**
     * @return void
     */
    public function testByHiraganaName(): void
    {
        $collection = Stadium::byHiraganaName('すみのえ');
        $this->assertSame(12, $collection->get('id'));
        $this->assertSame('ボートレース住之江', $collection->get('name'));
        $this->assertSame('住之江', $collection->get('short_name'));
        $this->assertSame('ぼーとれーすすみのえ', $collection->get('hiragana_name'));
        $this->assertSame('ボートレーススミノエ', $collection->get('katakana_name'));
        $this->assertSame('suminoe', $collection->get('english_name'));
        $this->assertSame('https://www.boatrace-suminoe.jp/', $collection->get('url'));
    }

    /**
     * @return void
     */
    public function testByKatakanaName(): void
    {
        $collection = Stadium::byKatakanaName('スミノエ');
        $this->assertSame(12, $collection->get('id'));
        $this->assertSame('ボートレース住之江', $collection->get('name'));
        $this->assertSame('住之江', $collection->get('short_name'));
        $this->assertSame('ぼーとれーすすみのえ', $collection->get('hiragana_name'));
        $this->assertSame('ボートレーススミノエ', $collection->get('katakana_name'));
        $this->assertSame('suminoe', $collection->get('english_name'));
        $this->assertSame('https://www.boatrace-suminoe.jp/', $collection->get('url'));
    }

    /**
     * @return void
     */
    public function testByEnglishName(): void
    {
        $collection = Stadium::byEnglishName('suminoe');
        $this->assertSame(12, $collection->get('id'));
        $this->assertSame('ボートレース住之江', $collection->get('name'));
        $this->assertSame('住之江', $collection->get('short_name'));
        $this->assertSame('ぼーとれーすすみのえ', $collection->get('hiragana_name'));
        $this->assertSame('ボートレーススミノエ', $collection->get('katakana_name'));
        $this->assertSame('suminoe', $collection->get('english_name'));
        $this->assertSame('https://www.boatrace-suminoe.jp/', $collection->get('url'));
    }

    /**
     * @return void
     */
    public function testByUrl(): void
    {
        $collection = Stadium::byUrl('suminoe');
        $this->assertSame(12, $collection->get('id'));
        $this->assertSame('ボートレース住之江', $collection->get('name'));
        $this->assertSame('住之江', $collection->get('short_name'));
        $this->assertSame('ぼーとれーすすみのえ', $collection->get('hiragana_name'));
        $this->assertSame('ボートレーススミノエ', $collection->get('katakana_name'));
        $this->assertSame('suminoe', $collection->get('english_name'));
        $this->assertSame('https://www.boatrace-suminoe.jp/', $collection->get('url'));
    }
}
