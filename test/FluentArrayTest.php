<?php

declare(strict_types=1);

namespace Takaram\FluentArray\Test;

use PHPUnit\Framework\TestCase;
use Takaram\FluentArray\FluentArray;

class FluentArrayTest extends TestCase
{
    public function testWrap()
    {
        $wrappedEmpty = FluentArray::wrap([]);
        $wrappedIntList = FluentArray::wrap([1]);
        $wrappedStringHash = FluentArray::wrap(['a' => 'b']);

        $this->assertInstanceOf(FluentArray::class, $wrappedEmpty);
        $this->assertInstanceOf(FluentArray::class, $wrappedIntList);
        $this->assertInstanceOf(FluentArray::class, $wrappedStringHash);
    }

    public function testUnwrap()
    {
        $wrappedEmpty = FluentArray::wrap([]);
        $wrappedIntList = FluentArray::wrap([1]);
        $wrappedStringHash = FluentArray::wrap(['a' => 'b']);

        $this->assertSame([], $wrappedEmpty->unwrap());
        $this->assertSame([1], $wrappedIntList->unwrap());
        $this->assertSame(['a' => 'b'], $wrappedStringHash->unwrap());
    }
}
