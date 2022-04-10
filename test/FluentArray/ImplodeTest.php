<?php

declare(strict_types=1);

namespace Takaram\FluentArray\Test;

use PHPUnit\Framework\TestCase;
use Takaram\FluentArray\FluentArray;

class ImplodeTest extends TestCase
{
    public function testImplode()
    {
        $this->assertSame('abc1', FluentArray::wrap(['a', 'b', 'c', 1])->implode());
        $this->assertSame('a,b,c,1', FluentArray::wrap(['a', 'b', 'c', 1])->implode(','));
        $this->assertSame('', FluentArray::wrap([])->implode());
        $this->assertSame('', FluentArray::wrap([])->implode(','));
    }
}
