<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'create_action', 'update_action', 'delete_action'
    ];

    /**
     * Mapping relationship permission and role
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
