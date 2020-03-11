<?php
/**
 * Created by PhpStorm.
 * User: UserUser
 * Date: 12.03.2020
 * Time: 1:51
 */

namespace App\Http\Controllers;


use App\User;

class UserController
{
    public function edit(User $user)
    {
        return view('profile');
    }

    public function update(User $user)
    {
        dd($user);
    }
}