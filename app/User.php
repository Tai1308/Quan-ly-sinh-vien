<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = "users";
    public $timestamps = false; 

    public function insertUser($name, $email)
    {
        $password = bcrypt('123456');
        $role = '3';
        return  DB::table('users')->insertGetId([   'name' => $name,
                                                    'email' => $email,
                                                    'password' => $password,
                                                    'role' => $role,
                                                ]);
    }

    public function insertUserTeacher($name, $email)
    {
        $password = bcrypt('123456');
        $role = '2';
        return  DB::table('users')->insertGetId([   'name' => $name,
                                                    'email' => $email,
                                                    'password' => $password,
                                                    'role' => $role,
                                                ]);
    }

}
