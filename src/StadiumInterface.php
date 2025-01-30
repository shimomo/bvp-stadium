<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

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
     * @param  \Boatrace\Venture\Project\StadiumCoreInterface|null  $stadiumCore
     * @return \Boatrace\Venture\Project\StadiumInterface
     */
    public static function getInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface;

    /**
     * @param  \Boatrace\Venture\Project\StadiumCoreInterface|null  $stadiumCore
     * @return \Boatrace\Venture\Project\StadiumInterface
     */
    public static function createInstance(?StadiumCoreInterface $stadiumCore = null): StadiumInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
