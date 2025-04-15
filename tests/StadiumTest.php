<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\Stadium;
use BVP\Stadium\StadiumInterface;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumTest extends TestCase
{
    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byNumberProvider')]
    public function testByNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byNumber(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byNameProvider')]
    public function testByName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byShortNameProvider')]
    public function testByShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byShortName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byHiraganaNameProvider')]
    public function testByHiraganaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byHiraganaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byKatakanaNameProvider')]
    public function testByKatakanaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byKatakanaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byEnglishNameProvider')]
    public function testByEnglishName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byEnglishName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumDataProvider::class, 'byUrlProvider')]
    public function testByUrl(array $arguments, array $expected): void
    {
        $this->assertSame($expected, Stadium::byUrl(...$arguments));
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Stadium\StadiumCore::resolveMethod() - " .
            "Call to undefined method 'BVP\Stadium\StadiumCore::invalid()'."
        );

        Stadium::invalid();
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenArgumentsAreTooFew(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Stadium\StadiumCore::by() - " .
            "Too few arguments to function BVP\Stadium\StadiumCore::byNumber(), " .
            "0 passed and exactly 1 expected."
        );

        Stadium::byNumber();
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenArgumentsAreTooMany(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "BVP\Stadium\StadiumCore::by() - " .
            "Too many arguments to function BVP\Stadium\StadiumCore::byNumber(), " .
            "2 passed and exactly 1 expected."
        );

        Stadium::byNumber(12, 34);
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
