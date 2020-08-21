<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table = 'country';
    protected $fillable = ['name'];

    public function company()
    {
         return $this->hasMany('App\Company')->with(['companyUsers']);
    }
}
