<?php
declare(strict_types=1);
namespace Soatok\Fedifur\Tests;

use Soatok\Fedifur\Collection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Soatok\Fedifur\Collection
 */
class CollectionTest extends TestCase
{
    public function testCalculateSeed()
    {
        $collection = new Collection(str_repeat("\xff", 32));
        $seed = bin2hex($collection->calculateSeed('127.0.0.1', '2023-07-24'));
        $this->assertSame('acd1b77e33f4f303df995f5222e97720a6bac4417422c5c3e55bbbe37ad3d024', $seed);

        $collection
            ->addMastodon('foo.com')
            ->addMastodon('bar.com')
            ->addMastodon('baz.com')
            ->addMastodon('qux.com');

        $instance = $collection->fetch('127.0.0.1', new \DateTime('2023-07-25'));
        $this->assertSame('https://bar.com/auth/sign_up', $instance->getUrl());
    }
}
