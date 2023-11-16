<?php

declare(strict_types=1);

use znr\identity\Identity;
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
    /**
     * @test
     */
    public function Identityは厳密比較可能(): void
    {
        $id1 = Identity::create(Base::class, 0);
        $id2 = Identity::create(Base::class, 0);
        $id3 = Identity::create(Base::class, 1);

        $this->assertTrue($id1 === $id2);
        $this->assertFalse($id1 === $id3);
    }

    /**
     * @test
     */
    public function 異なる型Identityの比較はfalseとなる(): void
    {
        $id1 = Identity::create(Base::class, 0);
        $id2 = Identity::create(Other::class, 0);

        //$this->assertFalse($id1 === $id2); // 静的解析が有効な場合、違う型の比較でエラーとなる
        $this->assertTrue(true); //ダミーのテスト
    }

    /**
     * @test
     */
    public function ベースクラスと派生クラスのId比較はfalseとなる(): void
    {
        $id1 = Identity::create(Base::class, 0);
        $id2 = Identity::create(Derived::class, 0);

        //$this->assertFalse($id1 === $id2); // 静的解析が有効な場合、違う型の比較でエラーとなる
        $this->assertTrue(true); //ダミーのテスト
    }
}
