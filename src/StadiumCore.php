<?php

declare(strict_types=1);

namespace BVP\Stadium;

/**
 * @author shimomo
 */
class StadiumCore implements StadiumCoreInterface
{
    /**
     * @var array
     */
    private array $stadiums;

    /**
     * @var array
     */
    private array $resolveMethodMap = [
        '/^by(.+)$/u' => 'by',
    ];

    /**
     * @return void
     */
    public function __construct()
    {
        $this->stadiums ??= require __DIR__ . '/../config/stadiums.php';
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return array|null
     */
    public function __call(string $name, array $arguments): ?array
    {
        return $this->resolveMethod($name, $arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return array|null
     *
     * @throws \BadMethodCallException
     */
    private function resolveMethod(string $name, array $arguments): ?array
    {
        foreach ($this->resolveMethodMap as $pattern => $method) {
            if (preg_match($pattern, $name, $matches)) {
                if (is_callable([$this, $method])) {
                    return $this->$method($matches[1], $arguments);
                }
            }
        }

        throw new \BadMethodCallException(
            __METHOD__ . "() - The specified method '{$name}' does not exist in class '" . self::class . "'."
        );
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return array|null
     */
    private function by(string $name, array $arguments): ?array
    {
        $snakeCaseName = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $name)), '_');
        $stadiums = array_combine(array_column($this->stadiums, $snakeCaseName), $this->stadiums);

        if (isset($stadiums[$arguments[0]])) {
            return $stadiums[$arguments[0]];
        }

        $filteredStadiums = array_filter($stadiums, function ($value, $key) use ($arguments) {
            return str_contains($key, $arguments[0]);
        }, ARRAY_FILTER_USE_BOTH);

        return reset($filteredStadiums);
    }
}
