<?php

namespace Willypuzzle\Happybirthday\Traits;

trait HappybirthdayUserTrait {

    /*
     * @var string This string is useful in order to specify default table in eloquent model
     */
    protected $table;

    /**
     * @param $date string This string has to be in 'yyyy-mm-dd' format
     */
    public function hasBirthdayToDate($date){
        $field = config('happybirthday.database.table.field');

        return $this->$field == $date;
    }

    public function hasBirthdayNow(){
        return $this->hasBirthdayToDate(date('Y-m-d'));
    }
}

