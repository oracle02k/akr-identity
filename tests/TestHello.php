<?php

declare(strict_types=1);

use ANakano\IdentityT\Hello;
use PHPUnit\Framework\TestCase;

final class TestHello extends TestCase
{
    public function testHello(): void
    {
        $hello = new Hello("taro");
        $this->assertSame("hello taro", $hello->sayHello());
    }
}