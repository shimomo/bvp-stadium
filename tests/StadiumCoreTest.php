<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\StadiumCore;
use PHPUnit\Framework\Attributes\DataProviderExternal;
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
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumCoreDataProvider::class, 'byNumberProvider')]
    public function testByNumber(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->stadium->byNumber(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumCoreDataProvider::class, 'byNameProvider')]
    public function testByName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->stadium->byName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumCoreDataProvider::class, 'byShortNameProvider')]
    public function testByShortName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->stadium->byShortName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumCoreDataProvider::class, 'byHiraganaNameProvider')]
    public function testByHiraganaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->stadium->byHiraganaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumCoreDataProvider::class, 'byKatakanaNameProvider')]
    public function testByKatakanaName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->stadium->byKatakanaName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumCoreDataProvider::class, 'byEnglishNameProvider')]
    public function testByEnglishName(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->stadium->byEnglishName(...$arguments));
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(StadiumCoreDataProvider::class, 'byUrlProvider')]
    public function testByUrl(array $arguments, array $expected): void
    {
        $this->assertSame($expected, $this->stadium->byUrl(...$arguments));
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

        $this->stadium->invalid();
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

        $this->stadium->byNumber();
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

        $this->stadium->byNumber(12, 34);
    }
}
