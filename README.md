# fluent-array
`fluent-array` allows you to call methods like `map` or `filter` on an array
instead of `array_map()` or `array_filter()`.

```php
use Takaram\FluentArray\FluentArray;

$range = range(1, 10);
$array = FluentArray::wrap($range)->map(fn ($i) => $i * 2)
                                  ->filter(fn ($i) => $i > 15)
                                  ->unwrap();
print_r($array);
```

This code outputs:

```
Array
(
    [7] => 16
    [8] => 18
    [9] => 20
)
```
