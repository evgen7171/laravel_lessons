<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    private static $DBusers = [
        [
            'id' => 1,
            'login' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '111'
        ],
        [
            'id' => 2,
            'login' => 'tor',
            'email' => 'user@user.com',
            'password' => '123'
        ],
        [
            'id' => 3,
            'login' => 'guest',
            'email' => '',
            'password' => ''
        ],
    ];

    /**
     * Получение всех пользователей из модели, а не из базы
     * @return array
     */
    public static function getAllModel()
    {
        return self::$DBusers;
    }

    /**
     * Получение пользователя из модели, а не из базы
     * @param $id
     * @return mixed
     */
    public static function getOneModel($id)
    {
        foreach (self::$DBusers as $user) {
            if ($user[$id] == $id) {
                return $user;
            }
        }
    }

    /**
     * Получение пользователя из модели, а не из базы
     * @param $id
     * @return mixed
     */
    public static function getPasswordModel($login)
    {
        foreach (self::$DBusers as $user) {
            if ($user['login'] == $login) {
                return $user['password'];
            }
        }
    }

    public static function getAll()
    {
//        $users = DB::select('select * from users');
        $users = DB::table('users')->get();
        return $users;
    }

    public static function getOne($id)
    {
//        $user = DB::select('select * from users where id = ?', [$id]);
        $user = DB::table('users')->where('id', $id)->get()[0];
        return $user;
    }

    public static function getPassword($login)
    {
        $password = DB::table('users')->where('login', $login)->value('password')[0];
        return $password;
    }
}
