<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table = 'country';
    protected $fillable = ['name'];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Company>
    */
    public function company()
    {
        return $this->hasMany('App\Models\Company')->with(['companyUsers']);
    }
}
