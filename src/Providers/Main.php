<?php
/**
 * Created by PhpStorm.
 * User: Domenico Rizzo (domenico.rizzo@gmail.com)
 * Date: 13/04/16
 * Time: 15.50
 */

namespace Willypuzzle\Happybirthday\Providers;

use Illuminate\Support\Facades\Route;



class Main
{
    public function isTodayBirthdayOfLoggedUser($guard = null){
        $user = auth($guard)->user();

        if (!$user){
            return false;
        }

        return $user->hasBirthdayNow();
    }

    /**
     * @param $date string This string has to be in every format recognized by Carbon::parse()
     */
    public function testBirthdayOfLoggedUser($date, $guard = null){
        $user = auth($guard)->user();

        if (!$user){
            return false;
        }

        return $user->hasBirthdayToDate($date);
    }

    public function testRoutes(){
        Route::group(['middleware' => ['web']], function () {
            Route::group(['middleware' => ['auth']], function () {
                Route::get('/happybirthday/test/now', '\Willypuzzle\Happybirthday\Http\Controllers\TestController@now');
                Route::get('/happybirthday/test/date/{date}', '\Willypuzzle\Happybirthday\Http\Controllers\TestController@date');
            });
        });
    }
}