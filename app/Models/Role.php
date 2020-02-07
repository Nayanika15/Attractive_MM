<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_name', 'description'
    ];

    /**
     * Mapping relationship role and permission
     */
    public function permission()
    {
        return $this->hasOne('App\Models\Permission');
    }

    /**
     * Mapping relationship role and permission
     */
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
