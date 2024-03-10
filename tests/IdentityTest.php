<?php

declare(strict_types=1);

use akr\identity\Identity;
use PHPUnit\Framework\TestCase;

class Base
{
};
class Other
{
};
class Derived extends Base
{
};

final class IdentityTest extends TestCase
{
    public function testShouldBeIdentityStrictlyComparable(): void
    {
        $id1 = Identity::create(Base::class, 0);
        $id2 = Identity::create(Base::class, 0);
        $id3 = Identity::create(Base::class, 1);

        $this->assertTrue($id1 === $id2);
        $this->assertFalse($id1 === $id3);
    }

    public function testShouldBeFalseWhenComparingIdentitiesOfDifferentTypes(): void
    {
        $id1 = Identity::create(Base::class, 0);
        $id2 = Identity::create(Other::class, 0);

        /** @psalm-suppress TypeDoesNotContainType */
        $this->assertFalse($id1 === $id2); // If static analysis is enabled, an error occurs because the type is different.
    }

    public function testShouldBeFalseWhenComparingBaseClassAndDerivedClass(): void
    {
        $id1 = Identity::create(Base::class, 0);
        $id2 = Identity::create(Derived::class, 0);

        /** @psalm-suppress TypeDoesNotContainType */
        $this->assertFalse($id1 === $id2); // If static analysis is enabled, an error occurs because the type is different.
    }
}
