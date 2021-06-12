<?php

use App\Models\User;

if (!function_exists('serial')) {

    /**
     * Get User Full Name
     *
     * @param
     * @return
     */
    function serial($serial)
    {
        $serial = $serial + 1;
        
        if($serial < 10) $serial = '000'. $serial;
        elseif ($serial < 100) $serial = '00'. $serial;
        elseif ($serial < 1000) $serial = '0'. $serial;
        else $serial;

        return $serial;
    }
}


if (!function_exists('show_char')) {

    /**
     * Get Limit of charecter of any data
     *
     * @param
     * @return
     */
    function show_char($data, $limit = null)
    {
        $length = strlen($data);

        if ($data != null){
            if($limit != null){
                if ($limit < $length){
                    $result = substr($data, 0, $limit). '...';
                } else {
                    $result = substr($data, 0, $limit);
                }
            } else {
                $limit = $length;
                $result = substr($data, 0, $limit);
            }
        } else {
            return null;
        }

        return $result;
    }
}




/**
 * Get Month
 */

if (!function_exists('monthyear')) {
    function monthyear($month)
    {

        // $result = (round(($month / 12) / 0.5, 0)) * 0.5;
        return (!is_null($month)) ? ((round(($month / 12) / 0.5, 0)) * 0.5) : null;
    }
}
