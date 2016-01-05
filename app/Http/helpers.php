<?php

if (! function_exists('getSection')) {
    /**
     * Unsets an existing selection to display yet to be displayed  options.
     *
     * @param  string
     *
     * @return string
     */
    function getSection($section)
    {
        $States = ['Computer Science' => 'Computer Science', 'Software Development' => 'Software Development', 'Personal Development' => 'Personal Development', 'Languages' => 'Languages', 'General Knowledge' => 'General Knowledge'];
        if (array_key_exists($section, $States)) {
            unset($States[$section]);
            foreach ($States as $key => $value) {
                echo "<option value='{$value}'>{$value}</option>";
            }
        }
    }
}

if (! function_exists('load_asset')) {
    /*
    * Set where to load assets from based on secure or non secure http
     */
    function load_asset($asset_url)
    {
        return (env('APP_ENV') === 'PRODUCTION') ? secure_asset($asset_url) : asset($asset_url);
    }
}
