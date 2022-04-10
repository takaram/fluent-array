<?php

declare(strict_types=1);

namespace Takaram\FluentArray\Test;

use PHPUnit\Framework\TestCase;
use Takaram\FluentArray\FluentArray;

class MapTest extends TestCase
{
    public function testMapIntList()
    {
        $fluentArray = FluentArray::wrap([1, 2, 3]);
        $result = $fluentArray->map(fn ($i) => $i * 2);

        $this->assertSame([2, 4, 6], $result->unwrap());
    }

    public function testMapStringList()
    {
        $fluentArray = FluentArray::wrap(['ab', 'cd', 'ef']);
        $result = $fluentArray->map(fn ($i) => 'foo' . $i);

        $this->assertSame(['fooab', 'foocd', 'fooef'], $result->unwrap());
    }

    public function testMapWithStringListInputAndIntListOutput()
    {
        $fluentArray = FluentArray::wrap(['abc', 'de', '', 'fghi']);
        $result = $fluentArray->map('strlen');

        $this->assertSame([3, 2, 0, 4], $result->unwrap());
    }
}
