<?php

declare(strict_types=1);

namespace Takaram\FluentArray\Test;

use PHPUnit\Framework\TestCase;
use Takaram\FluentArray\FluentArray;

class FilterTest extends TestCase
{
    public function testFilterWithIntList()
    {
        $fluentArray = FluentArray::wrap([0, 1, 2, 3, 4, 5]);
        $result = $fluentArray->filter(fn ($i) => $i % 2 === 0);

        $this->assertSame([0 => 0, 2 => 2, 4 => 4], $result->unwrap());
    }

    public function testFilterWithStringList()
    {
        $fluentArray = FluentArray::wrap(['a', 'bc', '', 'def']);
        $result = $fluentArray->filter(fn ($i) => strlen($i) > 1);

        $this->assertSame([1 => 'bc', 3 => 'def'], $result->unwrap());
    }

    public function testFilterModeArg()
    {
        $fluentArray = FluentArray::wrap([
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ]);
        $resultKey = $fluentArray->filter(fn ($key) => $key === 'c', \ARRAY_FILTER_USE_KEY);
        $resultBoth = $fluentArray->filter(fn ($val, $key) => $key === 'b' || $val === 1, \ARRAY_FILTER_USE_BOTH);

        $this->assertSame(['c' => 3], $resultKey->unwrap());
        $this->assertSame(['a' => 1, 'b' => 2], $resultBoth->unwrap());
    }
}
