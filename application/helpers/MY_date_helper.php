<?php
/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 06/08/2016
 * Time: 10:32 AM
 */

function get_date($time, $full_time = true)
{
    $fomat = '%d-%m-%Y';
    if($full_time)
    {
        $fomat = $fomat.'-%H:%i:%s';
    }
    $date = mdate($fomat , $time);
     return $date;
}