<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyUsersModel extends Model
{
    protected $table = 'company_users';

    protected $fillable = [
        'user_id', 'company_id'
    ];

    public function user_data()
    {
         return $this->belongsTo('App\User','user_id');
    }
}
