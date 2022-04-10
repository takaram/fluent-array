<?php

declare(strict_types=1);

namespace Takaram\FluentArray;

/**
 * This class allows you to call methods like `map` or `filter` on array.
 *
 * @author Takuya Aramaki <takaram71@gmail.com>
 * @template T
 */
class FluentArray
{
    /**
     * A factory method to create FluentArray instance with an array.
     *
     * @param array<T> $array
     * @return self<T>
     */
    public static function wrap(array $array): self
    {
        return new self($array);
    }

    /**
     * FluentArray constructor.
     *
     * @param array<T> $value
     */
    protected function __construct(
        protected array $value
    ) {
    }

    /**
     * Get an array this instance represents.
     *
     * @return array<T>
     */
    public function unwrap(): array
    {
        return $this->value;
    }

    /**
     * Apply `$callback` to each element.
     * Corresponds to `array_map()`.
     *
     * @param callable $callback
     * @return self<T>
     */
    public function map(callable $callback): self
    {
        return static::wrap(array_map($callback, $this->value));
    }

    /**
     * Filter out elements if `$callback` called with it returns falsy value.
     *
     * @param callable $callback
     * @param int $mode mode paramter given to `array_filter()`
     * @return self<T>
     */
    public function filter(callable $callback, int $mode = 0): self
    {
        return static::wrap(array_filter($this->value, $callback, $mode));
    }

    /**
     * Join array values with `$separator`.
     *
     * @param string $separator
     * @return string
     */
    public function implode(string $separator = ''): string
    {
        return implode($separator, $this->value);
    }
}
