<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'company';
    protected $fillable = [
        'name', 'company_id'
    ];

    public function companyUsers()
    {
        return $this->hasMany('App\CompanyUsersModel')->with(['user_data']);
    }
}
