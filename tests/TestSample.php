<?php

use PHPUnit\Framework\TestCase;

final class TestSample extends TestCase
{
    public function testExample()
    {
        $this->assertSame(false, true);
    }
}