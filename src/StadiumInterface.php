<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @author shimomo
 */
interface StadiumInterface
{
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
