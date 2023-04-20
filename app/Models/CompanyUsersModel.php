<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUsersModel extends Model
{
    protected $table = 'company_users';

    protected $fillable = [
        'user_id', 'company_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, CompanyUsersModel>
     */
    public function user_data()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
