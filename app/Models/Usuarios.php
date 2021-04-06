<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class Usuarios extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable;
    use HasRoles;
	
	protected $table 	  = 'usuarios';


    protected $fillable   = [
              'id',
              'name',
              'username',
              'last_name',
              'email',
              'password',
              'status',
              'created_at',
              'updated_at'
        ]; 
        
protected $hidden   = [ 'password', 'remember_token', 'id', 'api_token', 'created_at', 'updated_at'];

protected $casts = [
'email_verified_at' => 'datetime',
];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getDisplayNameAttribute()
	{
		return trim(str_replace( '  ', ' ',  "{$this->name} {$this->last_name}")) ;
	}

    protected $appends = ['full_name'];


    protected $searchable = [
        'columns' => [
          'users.name' => 5,
          'users.last_name' => 5,
        ]
    ];


    /*
    |
    | ** Relationships model **
    |
    */

    public function logins()
    {
        return $this->hasMany('App\Models\Login');
    }

    /*
    |
    | ** Accesors model **
    |
    */

    public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }


    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Denegado';
    }

    /*
    |
    | ** Mutators model **
    |
    */

    public function setPasswordAttribute($attribute)
    {
        if (! empty($attribute))
        {
           $this->attributes['password'] = strlen($attribute) < 60 ? bcrypt($attribute) : $attribute;
        }
    }

    /*
    |
    | ** Send the custom password reset notification **
    |
    */


}
