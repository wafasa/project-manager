<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'permissions',
        'created_by',
        'status'
    ];

    public function setPermissionsAttribute( $value ) {
        if ( ! empty($value) ) {
            $this->attributes['permissions'] = serialize( $value );
        }
    }

    public function getPermissionsAttribute( $value ) {
        return unserialize( $value );
    }

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'project_role_user', 'role_id', 'user_id');
    }
}
