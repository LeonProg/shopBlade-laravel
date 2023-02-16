<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * registration user
     *
     * @param RegistrationRequest $request
     * @return RedirectResponse
     */
    public function registration(RegistrationRequest $request) : RedirectResponse
    {
        $user = User::query()->create(
            ['password' => Hash::make($request->password)] +
            $request->validated()
        );

        Auth::login($user);

        return $this->home();
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            return $this->home();
        }

        return back()->withErrors(['incorrect' => 'Неверный логин или пароль']);


    }

    public function logout()
    {
        Auth::logout();

        return $this->home();

    }

    private function home()
    {
        return redirect()->route('home');
    }
}
