
<?php

class Util
{

    //  return current date
    static function get_current_date()
    {
        return date("Y-m-d");
    }

    static function get_current_time()
    {
        return date("H:i:s");
    }

    ///change date format from yyyy-mm-dd to dd-mm-yyyy

    static function convert_date($date)
    {
        $date = date_create($date);
        $date = date_format($date, "d-m-Y");
        return $date;
    }

    static function toUppercase($word)
    {
        $wordWithUppercase = ucfirst($word);
        return $wordWithUppercase;
    }
}
