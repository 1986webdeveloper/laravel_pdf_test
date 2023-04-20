<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company';
    protected $fillable = [
        'name', 'company_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<CompanyUsersModel>
    */
    public function companyUsers()
    {
        return $this->hasMany('App\Models\CompanyUsersModel')->with(['user_data']);
    }
}
