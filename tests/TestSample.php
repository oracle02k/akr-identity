<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TestSample extends TestCase
{
    public function testExample():void
    {
        $this->assertSame(false, true);
    }
}
