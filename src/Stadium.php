<?php

declare(strict_types=1);

namespace BVP\Stadium;

use Illuminate\Support\Collection;

/**
 * @author shimomo
 */
class Stadium implements StadiumInterface
{
    /**
     * @var \BVP\Stadium\StadiumInterface|null
     */
    private static ?StadiumInterface $instance;

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface  $stadium
     * @return void
     */
    public function __construct(private readonly StadiumCoreInterface $stadium) {}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public function __call(string $name, array $arguments): ?Collection
    {
        return $this->stadium->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    public static function __callStatic(string $name, array $arguments): ?Collection
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface|null  $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function getInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface
    {
        return self::$instance ??= new self($stadiumCore ?? new StadiumCore());
    }

    /**
     * @param  \BVP\Stadium\StadiumCoreInterface|null  $stadiumCore
     * @return \BVP\Stadium\StadiumInterface
     */
    public static function createInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface
    {
        return self::$instance = new self($stadiumCore ?? new StadiumCore());
    }

    /**
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
