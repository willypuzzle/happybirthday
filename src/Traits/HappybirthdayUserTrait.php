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

        if((29 == $birthdayDate->day && 2 == $birthdayDate->month) && (0 != $inputDate->year % 4) && ('every4years' != config('happybirthday.leapday'))){
            if ('1march' == config('happybirthday.leapday')) {
                $birthdayDate->day = 1;
                $birthdayDate->month = 3;
            }else{
                $birthdayDate->day = 28;
                $birthdayDate->month = 2;
            }
        }

        return ($birthdayDate->day == $inputDate->day) && ($birthdayDate->month == $inputDate->month);
    }

    public function hasBirthdayNow(){
        return $this->hasBirthdayToDate(date('Y-m-d'));
    }
}

