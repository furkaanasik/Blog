<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    protected AuthService $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param UserLoginRequest $userLoginRequest
     * @return RedirectResponse
     */
    public function loginUser(UserLoginRequest $userLoginRequest): RedirectResponse
    {
        $userRole = $this->authService->loginUser($userLoginRequest->only('email', 'password'));

        switch ($userRole)
        {
            case "ADMIN":
                return redirect()->route('admin.dashboard');
            case "USER":
                return redirect()->route('get.all.post');
            default:
                return redirect()->route('get.all.post');
        }
    }

    /**
     * @param UserCreateRequest $userCreateRequest
     * @return RedirectResponse
     */
    public function registerUser(UserCreateRequest $userCreateRequest): RedirectResponse
    {
        $response = $this->authService->registerUser($userCreateRequest->all());
        return redirect()->route('login');
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        $this->authService->logOut();
        return Redirect()->route('get.all.post');
    }


}
