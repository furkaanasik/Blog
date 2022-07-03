<?php

namespace App\Services;

use App\Enums\UserRoleEnum;
use App\Repository\AuthRepository\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService
{
    protected AuthRepositoryInterface $authRepository;

    /**
     * @param AuthRepositoryInterface $authRepository
     */
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param $credentials
     * @return string
     */
    public function loginUser($credentials)
    {
        if (Auth::attempt($credentials))
        {
            switch (Auth::user()->role_as)
            {
                case UserRoleEnum::ADMIN->value:
                    return UserRoleEnum::ADMIN->name;
                case UserRoleEnum::USER->value:
                    return UserRoleEnum::USER->name;
            }
        }

        return UserRoleEnum::USER->name;
    }

    /**
     * @param array $register
     * @return mixed
     */
    public function registerUser(array $register)
    {
        return $this->authRepository->creteUser($register);
    }

    /**
     * @return void
     */
    public function logOut()
    {
        Session::flush();
        Auth::logout();
    }
}
