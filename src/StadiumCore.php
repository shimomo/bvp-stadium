<?php

declare(strict_types=1);

namespace BVP\Stadium;

use Shimomo\Helper\Arr;

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
        $this->stadiums = require __DIR__ . '/../config/stadiums.php';
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
     *
     * @throws \InvalidArgumentException
     */
    private function by(string $name, array $arguments): ?array
    {
        if (($countArguments = count($arguments)) !== 1) {
            $messageType = $countArguments === 0 ? 'few' : 'many';
            throw new \InvalidArgumentException(
                __METHOD__ . "() - Too {$messageType} arguments to function " . self::class . "::by{$name}(), " .
                "$countArguments passed and exactly 1 expected."
            );
        }

        $snakeCaseName = $this->snakeCase($name);
        $flattenArguments = $this->arrayFlatten($arguments);
        $exactMatchedStadium = Arr::firstWhere($this->stadiums, $snakeCaseName, $flattenArguments[0]);
        if (!is_null($exactMatchedStadium)) {
            return $exactMatchedStadium;
        }

        $partialMatchedStadiums = array_filter($this->stadiums, function ($stadium, $key) use ($snakeCaseName, $flattenArguments) {
            return str_contains((string) $stadium[$snakeCaseName], (string) $flattenArguments[0]);
        }, ARRAY_FILTER_USE_BOTH);

        return reset($partialMatchedStadiums);
    }

    /**
     * @param  array  $array
     * @return array
     */
    private function arrayFlatten(array $array): array
    {
        $response = [];
        array_walk_recursive($array, function ($value) use (&$response) {
            $response[] = $value;
        });

        return $response;
    }

    /**
     * @param  string  $value
     * @return string
     */
    private function snakeCase(string $value): string
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $value)), '_');
    }
}
