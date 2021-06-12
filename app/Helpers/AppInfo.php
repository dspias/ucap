<?php

if (!function_exists('app_name')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function app_name()
    {
        return ucap_get('app_name') ?? env('APP_NAME');
    }
}

if (!function_exists('app_url')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function app_url()
    {
        return 'www.ucap.com';
        // return env('APP_URL');
    }
}
