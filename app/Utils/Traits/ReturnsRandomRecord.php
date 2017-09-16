<?php

namespace App\Utils\Traits;

use Illuminate\Database\Eloquent\Collection as DbCollection;
use Illuminate\Support\Collection as Collection;

/**
 * This trait should be used only on Eloquent models.
 * It returns random record from the DB if any exist.
 */
trait ReturnsRandomRecord
{
    /**
     * Get single record (or null if table empty).
     *
     * @return mixed
     */
    static function getRandomRecord()
    {
        return static::inRandomOrder()->first();
    }

    /**
     * Get property value of single random record (or null if table empty)
     *
     * @return mixed
     */
    static function getRandomRecordProperty(string $propName)
    {
        return static::inRandomOrder()
                     ->first()
                     ->{$propName};
    }

    /**
     * Get specified $number of records. If less than or equal to $number 
     * records exist all will be returned.
     *
     * @param int $number Number of records to return
     * @return \Illuminate\Database\Eloquent\Collection 
     */
    static function getManyRandomRecord(int $number) : DbCollection
    {
        return static::inRandomOrder()
                     ->take($number)
                     ->get();
    }

    static function getManyRandomRecordsProperty(int $number, string $prop) : Collection
    {
        return static::inRandomOrder()
                     ->take($number)
                     ->pluck($prop);
    }
}