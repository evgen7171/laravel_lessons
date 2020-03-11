<?php

namespace App;

use App\Rules\Enum;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
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

    public static $roles = [
        0 => 'user',
        1 => 'admin'
    ];


    /**
     * Правила валидации
     * @return array
     */
    public static function rules()
    {
        $emails = toArrayValues(User::all('email')->toArray());
        // todo не сделано чтобы подходили любые email в том числе собственный
        return [
            'name' => 'required|string|max:30',
            'email' => 'email|required_without_all:' . implode(',', array_values($emails)),
            'password' => 'required',
            'confirm' => 'same:password',
            'newPassword' => 'required|string|min:3'
            //'role' => 'required|in:' . implode(',', array_keys(self::$roles)), //new Enum(self::$roles)],
        ];
    }

    protected static function attributeNames()
    {
        return [
            'confirm' => 'Подтверждение пароля',
            'newPassword' => 'Новый пароль'
        ];
    }

    public static function validPassword($data, $user)
    {
        return Hash::check($data['password'], User::find($user->id)->password);
    }
}
