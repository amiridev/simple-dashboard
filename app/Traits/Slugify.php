<?php

namespace App\Traits;

/**
 * Trait Slugable
 *
 * @package App\Contracts\Traits
 *
 * @property string $slug
 */
trait Slugify
{
    /**
     * @param string $value
     * @param string $separator
     * @param string $column
     *
     * @return string
     */
    public static function slugify(string $value, $separator = '-', $column = 'slug')
    {
        $slug  = fa_slug($value);
        $temp = $slug;
        $count = 1;
        while (true) {
            if (static::where($column, $temp)->first())
                $temp = $slug . $separator . $count;
            else break;
            $count++;
        }
        return $temp;
    }
}
