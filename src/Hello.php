<?php

declare(strict_types=1);

namespace ANakano\IdentityT;

class Hello
{
    public function __construct(private string $name)
    {
    }

    /**
     * @return non-empty-string
     */
    public function sayHello(): string
    {
        return "hello {$this->name}";
    }
}
