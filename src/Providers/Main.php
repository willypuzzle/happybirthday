<?php

/**
 * Created by PhpStorm.
 * User: Domenico Rizzo (domenico.rizzo@gmail.com)
 * Date: 13/04/16
 * Time: 15.50
 */
class Main
{
    public function isTodayBirthdayOfLoggedUser(){
        $user = auth(config('happybirthday.guard'))->user();

        if (!$user){
             return $user->hasBirthdayNow();
        }
    }
}