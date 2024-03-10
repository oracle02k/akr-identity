<?php

declare(strict_types=1);

namespace akr\identity;

/**
 * @psalm-immutable
 * @template T of object
 */
class Identity
{
    /** @var array<string, \WeakReference<Identity>> */
    private static array $instances = [];

    /**
     * @template TClass of object
     * @param class-string<TClass> $class
     * @return self<TClass>
     */
    public static function create(string $class, int $value): self
    {
        $key = self::makeKey($class, $value);

        if (array_key_exists($key, self::$instances)) {
            /** @var Identity<TClass> */
            return self::$instances[$key]->get();
        }

        $identity = new self($class, $value);
        self::$instances[$key] = \WeakReference::create($identity);

        return $identity;
    }

    /**
     * @psalm-pure
     * @template TClass of object
     * @param class-string<TClass> $class
     */
    public static function makeKey(string $class, int $value): string
    {
        return "{$class}_{$value}";
    }

    /**
     * @param class-string<T> $typeName
     */
    private function __construct(readonly string $typeName, readonly int $value)
    {
    }

    public function __destruct()
    {
        /** @psalm-suppress ImpureStaticProperty */
        unset(self::$instances[$this->key()]);
    }

    public function key(): string
    {
        return self::makeKey($this->typeName, $this->value);
    }
}
