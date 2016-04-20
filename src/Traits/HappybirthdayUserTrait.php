<?php

namespace Willypuzzle\Happybirthday\Traits;

use Carbon\Carbon;

trait HappybirthdayUserTrait {


    /**
     * @param $date string This string has to be in every format recognized by Carbon::parse()
     */
    public function hasBirthdayToDate($date){
        $field = config('happybirthday.database.table.field');

        $birthdayDate = Carbon::parse($this->$field);
        $inputDate = Carbon::parse($date);

        if(29 != $birthdayDate->day && 2 != $birthdayDate->month){
            return ($birthdayDate->day == $inputDate->day) && ($birthdayDate->month == $inputDate->month);
        }else{
            if('every4years' != config('happybirthday.leapday')){
                if ('1march' == config('happybirthday.leapday')) {
                    $leapDay = 1;
                    $leapMonth = 3;
                }else{
                    $leapDay = 28;
                    $leapMonth = 2;
                }
                if ($leapDay == $inputDate->day && $leapMonth == $inputDate->month && (0 != $inputDate->year % 4)) {
                    return true;
                } else {
                    return false;
                }
            }else{
                return ($birthdayDate->day == $inputDate->day) && ($birthdayDate->month == $inputDate->month);
            }
        }
    }

    public function hasBirthdayNow(){
        return $this->hasBirthdayToDate(date('Y-m-d'));
    }
}

