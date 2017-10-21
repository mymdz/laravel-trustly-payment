<?php
/**
 * Created on 22.10.17 at 01:09.
 * By user: Denis Zadorozhny
 */

namespace Mymdz\Trustly\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class Trustly
 * @package Mymdz\Trustly\Facades
 */
class Trustly extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'trustly';
    }
}