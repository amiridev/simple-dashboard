<?php

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;

if (!function_exists('j_date_format')) {
    /**
     * @param Carbon|null $date
     *
     * @param string $format
     * @return string
     */
    function j_date_format(Carbon $date = null, $format = 'H:i  Y/n/d', $timezone = 'Asia/Tehran')
    {
        if ($date) {
            $instance = Verta::instance($date);
            return $instance->timezone($timezone)->format($format);
        }
        return null;
    }
}

if (!function_exists('uploadFile')){
    /**
     * @param $file
     * @param string $path
     * @return string|null
     */
     function uploadFile($file, $path = 'pictures')
    {
        if ($file) {
            try {
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path($path), $fileName);
                return "public/{$path}/{$fileName}";
            } catch (\Exception $exp) {
                return null;
            }
        }
        return null;
    }
}

if (!function_exists('fa_slug')) {
    /**
     * Get the fa slug string
     *
     * @param string $title
     * @param string $separator
     *
     * @return string
     */
    function fa_slug($title, $separator = '-')
    {
        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, trim($title));

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower($title, 'UTF-8'));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}
