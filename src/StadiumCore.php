<?php

declare(strict_types=1);

namespace BVP\Stadium;

use BadMethodCallException;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @author shimomo
 */
class StadiumCore implements StadiumCoreInterface
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private Collection $stadiums;

    /**
     * @return void
     */
    public function __construct()
    {
        Collection::macro('recursive', fn() => $this->map(
            fn($value) => is_array($value) || is_object($value)
                ? collect($value)->recursive()
                : $value
        ));
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     *
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments): ?Collection
    {
        if (!empty($arguments) && preg_match('/^by(.+)$/u', $name, $matches)) {
            return $this->by($matches[1], $arguments);
        }

        throw new BadMethodCallException(
            __METHOD__ . "() - The specified method '{$name}' does not exist in class '" . self::class . "'."
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function loadConfig(): Collection
    {
        return $this->stadiums ??= collect(
            require __DIR__ . '/../config/stadiums.php'
        )->recursive();
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Illuminate\Support\Collection|null
     */
    private function by(string $name, array $arguments): ?Collection
    {
        $stadiums = $this->loadConfig()->keyBy(Str::snake($name));
        if ($stadiums->has($arguments[0])) {
            return $stadiums->get($arguments[0]);
        }

        return $stadiums->filter(
            fn($value, $key) => Str::contains($key, $arguments[0])
        )->first();
    }
}
