<?php

declare(strict_types=1);

namespace BVP\Stadium;

use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
interface StadiumInterface
{
    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public function __call(string $name, array $arguments): ?Collection;

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public static function __callStatic(string $name, array $arguments): ?Collection;

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface|null  $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function getInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface;

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface|null  $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function createInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
