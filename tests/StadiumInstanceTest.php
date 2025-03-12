<?php

declare(strict_types=1);

namespace BVP\Stadium\Tests;

use BVP\Stadium\Stadium;
use BVP\Stadium\StadiumInterface;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class StadiumInstanceTest extends TestCase
{
    /**
     * @return void
     */
    protected function tearDown(): void
    {
        Stadium::resetInstance();
    }

    /**
     * @return void
     */
    public function testGetInstance(): void
    {
        $this->assertInstanceOf(StadiumInterface::class, Stadium::getInstance());
    }

    /**
     * @return void
     */
    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(StadiumInterface::class, Stadium::createInstance());
    }

    /**
     * @return void
     */
    public function testResetInstance(): void
    {
        $instance1 = Stadium::getInstance();
        Stadium::resetInstance();
        $instance2 = Stadium::getInstance();
        $this->assertNotSame($instance1, $instance2);
    }
}
