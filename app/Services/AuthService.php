<?php

namespace App\Services;

use App\Repository\AuthRepository\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService
{
    protected $authRepository;

    /**
     * @param $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLoginPage()
    {
        return view('Auth.login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showRegistrationPage()
    {
        return view('Auth.registration');
    }

    /**
     * @param $credentials
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginUser($credentials)
    {
        if (Auth::attempt($credentials))
        {
            if(Auth::user()->role_as == '1') // ADMIN
            {
                return redirect('/admin/dashboard');
            }

            else if(Auth::user()->role_as == '0') // USER
            {
                return redirect('/');
            }

            else
            {
                return redirect('/');
            }
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * @param array $register
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(array $register)
    {
        $this->authRepository->creteUser($register);
        return redirect()->route('login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('Component.posts');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect()->route('get.all.post');
    }
}
