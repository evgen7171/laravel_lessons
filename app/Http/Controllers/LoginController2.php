<?php


namespace App\Http\Controllers;

use App\Models\User;

class LoginController2 extends Controller
{
    /**
     * метод формы
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function loginForm()
    {
        return view('loginForm');
    }

    /**
     * получает логин, если пользователь авторизован
     * @return bool|mixed
     */
    public static function getLogin()
    {
        return isset($_SESSION['login']) ? $_SESSION['login'] : false;
    }

    /**
     * проверка авторизации
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public static function check()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if (!self::isUser($login)) {
            self::error('login');
        }
        if (!self::isVerify($login, $password)) {
            self::error('password');
        }
        self::auth($login);
        return redirect('/');
    }

    /**
     * проверка логина
     * @param $login
     * @return bool
     */
    public static function isUser($login)
    {
//        return User::getAll()->login == $login;
        return in_array($login,
            array_column(User::getAllModel(), 'login')
        );
    }

    /**
     * проверка пароля
     * @param $login
     * @param $password
     * @return bool
     */
    public static function isVerify($login, $password)
    {
        return User::getPasswordModel($login) == $password;
//        return User::getPassword($login)['password'] == $password;
    }

    /**
     * метод ошибки
     * @param $message
     */
    public static function error($message)
    {
        $str = 'error: wrong ' . $message;
        dd($str);
    }

    /**
     * получение логина из сессии
     * @param $login
     */
    public static function auth($login)
    {
        $_SESSION['login'] = $login;
    }

    /**
     * разлогирование
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public static function logout()
    {
        unset($_SESSION['login']);
        return redirect('/');
    }

    /**
     * проверка логирования
     * @return bool
     */
    public static function isLogged()
    {
        return isset($_SESSION['login']) and $_SESSION['login'] != 'guest';
    }

    public static function isAdmin()
    {
        return isset($_SESSION['login']) and $_SESSION['login'] == 'admin';
    }
}
