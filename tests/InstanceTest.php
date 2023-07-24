<?php
declare(strict_types=1);
namespace Soatok\Fedifur\Tests;

use PHPUnit\Framework\TestCase;
use Soatok\Fedifur\Instance;

/**
 * @covers \Soatok\Fedifur\Instance
 */
class InstanceTest extends TestCase
{
    public function testUrl()
    {
        $this->assertSame(
            'https://foo.bar/foo/baz',
            (new Instance('foo.bar', 'foo/baz'))->getUrl()
        );
        $this->assertSame(
            'https://foo.bar/foo/baz',
            (new Instance('foo.bar', 'foo/baz/'))->getUrl()
        );
        $this->assertSame(
            'https://foo.bar/foo/baz',
            (new Instance('foo.bar', 'foo/baz//////'))->getUrl()
        );
        $this->assertSame(
            'https://foo.bar/foo/baz',
            (new Instance('foo.bar', '///////////////foo/baz'))->getUrl()
        );
    }
}
