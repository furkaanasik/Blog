<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLoginPage()
    {
        return $this->authService->showLoginPage();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showRegistrationPage()
    {
        return $this->authService->showRegistrationPage();
    }

    /**
     * @param UserLoginRequest $userLoginRequest
     * @return mixed
     */
    public function loginUser(UserLoginRequest $userLoginRequest)
    {
        return $this->authService->loginUser($userLoginRequest->only('email', 'password'));
    }

    /**
     * @param UserCreateRequest $userCreateRequest
     * @return mixed
     */
    public function registerUser(UserCreateRequest $userCreateRequest)
    {
        return $this->authService->registerUser($userCreateRequest->all());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        return $this->authService->logOut();
    }


}
