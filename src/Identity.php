<?php

declare(strict_types=1);

namespace ANakano\IdentityT;

/**
 * @template T of object
 * @psalm-immutable
 */
class Identity
{
    /** @var Identity[] */
    private static array $instances = [];

    /**
     * @template TClass of object
     * @param class-string<TClass> $class
     * @param int                  $value
     * @return self<TClass>
     */
    public static function create(string $class, int $value): self
    {
        $key = "{$class}_{$value}";
        if (array_key_exists($key, self::$instances)) {
            /** @var self<TClass> */
            return self::$instances[$key];
        }

        $identity = new self($class, $value);
        self::$instances[$key] = $identity;

        return $identity;
    }

    /**
     * @param class-string<T> $typeName
     */
    private function __construct(readonly string $typeName, readonly int $value)
    {
    }
}
