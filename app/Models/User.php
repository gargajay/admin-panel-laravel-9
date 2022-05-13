<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;


    const STATUS_ACTIVE = 1;

    const STATUS_DEACTIVED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole(){
        return  Auth::user()->roles->pluck('name')[0] ?? '';
    }

    public static function getStatus($id = null)
    {
        $list = array(
            self::STATUS_ACTIVE => "Active",
            self::STATUS_DEACTIVED=> "Deactivated",
        );
        if ($id === null)
            return $list;
        return isset($list[$id]) ? $list[$id] : 'Not Defined';
    }


    public function getProfilePhotoAttribute($value)
    {
        if ($value != '') {
            return url('/') . '/uploads/' . $value;
        }
        
        return url('/') . '/uploads/user.png' ;
    }







}
