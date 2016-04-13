<?php
/**
 * Created by PhpStorm.
 * User: Domenico Rizzo (domenico.rizzo@gmail.com)
 * Date: 13/04/16
 * Time: 16.14
 */

namespace Willypuzzle\Happybirthday\Facades;

use Illuminate\Support\Facades\Facade;

class Happybirthday extends Facade
{
    protected static function getFacadeAccessor() {
        return 'Happybirthday';
    }
}