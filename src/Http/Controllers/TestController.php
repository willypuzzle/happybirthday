<?php

namespace Willypuzzle\Happybirthday\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Willypuzzle\Happybirthday\Facades\Happybirthday;

class TestController extends Controller
{
    //
    public function now(){
        return Happybirthday::isTodayBirthdayOfLoggedUser() ? "Birthday" : "Not Birthday";
    }

    public function date($date){
        return Happybirthday::testBirthdayOfLoggedUser($date) ? "Birthday" : "Not Birthday";
    }
}
