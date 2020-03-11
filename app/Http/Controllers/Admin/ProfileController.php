<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('admin.profiles.profiles', ['users' => User::all()]);
    }

    public function change(User $user)
    {
        if (!Auth::user()->is_admin) {
            $user = Auth::user();
        }

        return view('admin.profiles.changeProfile', [
            'user' => $user,
            'role' => $user->is_admin ? 'admin' : 'user',
            'roles' => User::$roles,
            'editor' => Auth::user()
        ]);
    }

    public function apply(Request $request, User $user)
    {
        $errors = [];
        $data = $request->all();
        if ($request->get('unchangePassword')) {
            $data = $request->except('password', 'confirm', 'newPassword');
            $data['password'] = $user->password;
            $result = $user->fill($data)->save();
        } else {
            $this->validate($request, User::rules(), [], User::attributeNames());

            if (User::validPassword($data, $user)) {
                $data['password'] = Hash::make($data['newPassword']);
                $result = $user->fill($data)->save();
            } else {
                $errors['password'][] = 'Текщий пароль не верный';
                return redirect()
                    ->route('admin.profile.change', $user)->withErrors($errors);
            }
        }

        if ($result) {
            return redirect()
                ->route('admin.profiles')->with('success', 'Данные пользователя успешно изменены!');
        } else {
            $request->flash();
            return redirect()
                ->route('admin.profile.change')->with('error', 'Ошибка изменения данных!');
        }
    }

    public function delete(User $user)
    {
        $result = $user->delete();
        if ($result) {
            return redirect()->route('admin.profiles')->with('success', 'Пользователь удален');
        } else {
            return redirect()->route('admin.profiles')->with('error', 'Ошибка удаления данных');
        }
    }
}
