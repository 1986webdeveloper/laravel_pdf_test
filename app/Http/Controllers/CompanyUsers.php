<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CompanyUsers extends Controller
{
    public static function Index(Request $request): void{
        $contriesDetailObj = new Country;
        $contriesDetailObj = $contriesDetailObj->with(['company'])->get()->toArray();
        echo '<pre>'; print_r($contriesDetailObj);
    }
}
