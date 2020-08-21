<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyUsers extends Controller
{
    public static function Index(Request $request){
        $contriesDetailObj  = new \App\Country;
        $contriesDetailObj = $contriesDetailObj->with(['company'])->get()->toArray();
        echo '<pre>'; print_r($contriesDetailObj);
    }
}
