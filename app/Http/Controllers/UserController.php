<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Services\UserServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserServices $userService;

    /**
     * @param UserServices $userService
     */
    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param int $postId
     * @param string $slug
     * @param CreateCommentRequest $createCommentRequest
     * @return RedirectResponse
     */
    public function createComment(int $postId, string $slug, CreateCommentRequest $createCommentRequest): RedirectResponse
    {
        $response = $this->userService->createComment($postId, $slug, $createCommentRequest->all());

        if($response)
            return redirect()->route('get.post', [$slug]);
        else
            return redirect()->route('login');
    }
}
