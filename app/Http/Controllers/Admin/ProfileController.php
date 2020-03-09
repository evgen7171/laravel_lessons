<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\NewsController;
use App\Models\Admin;
use App\Models\News;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('admin/users', ['users' => User::all()]);
    }

    public function change(User $user)
    {
        return view('admin/changeUser', [
            'user' => $user,
            'roles' => User::$roles
        ]);
    }

    public function apply(Request $request, User $user)
    {
//        $this->validate($request, User::rules(), [], News::attributeNames());

        $result = $user->fill($request->all())->save();

        if ($result) {
            return redirect()
                ->route('admin.users')->with('success', 'Данные пользователя успешно изменены!!');
        } else {
            $request->flash();
            return redirect()
                ->route('admin.user.change')->with('error', 'Ошибка изменения данных!');
        }
    }

}
