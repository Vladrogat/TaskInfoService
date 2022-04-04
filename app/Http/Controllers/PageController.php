<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Mail\RegistrConfirm;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    function index() {
        $user = Auth::user();
        return view('pages.home', compact('user'));
    }

    function list () {
        $user = Auth::user();
        $applications = Application::where('idUser', '=', $user->id)->get();
        return view('pages.list', compact('user', "applications"));
    }

    function feedback () {
        $user = Auth::user();
        return view('pages.feedback', compact('user'));
    }
    //-------Создание заявки-------//

    function create (ApplicationRequest $request) {
        $fields = $request->validated();
        $fields['idUser'] = Auth::check() ? Auth::user()->id : null;
        $fields['phone'] = str_replace("+", "", $fields['phone']);
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName =time() . "_" . $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/application/',$fileName);
            $fields["file"] = '/uploads/application/' . $fileName;
        }
        Application::create($fields);

        return redirect(route('feedback'))->with('success', 'заявку создана');

    }

    //-----Аутентификация-----//

    function login (Request $request) {
        if (Auth::check()) {
            return redirect(route('list'));
        }
        $fields = $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required|',
        ]);
        $user = User::whereEmail($request->email)->first();

        Auth::login($user);
        if (Auth::check()) {
            return redirect()->intended(route('list'));
        }
        return redirect(route('authorization'))->with('error', 'Не удалось авторизироваться');
    }

    function save (Request $request) {
        if (Auth::check()) {
            return redirect(route('list'));
        }
        if (trim($request['confirm']) === trim($request['password'])) {
            $fields = $request->validate([
                'login' => 'bail|required|min:4',
                'email' => 'bail|required|email',
                'password' => 'bail|required|min:5'
            ]);
            $user = User::create($fields);
            if ($user) {
                Mail::to($request->email)->send(new RegistrConfirm());

                Auth::login($user);

                return redirect(route('list'));
            } else {
                return redirect(route('registration'))->with(
                    'error', 'Произошла ошибка при сохранении пользователя');
            }
        } else {
            return redirect(route('registration'))->with(
            'error', 'пароли должны совпадать');
        }
    }

    function logout() {
        Auth::logout();
        return redirect(route('home'));
    }
}
