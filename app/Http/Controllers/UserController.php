<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    /**
     * @param $userService
     */
    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param int $postId
     * @param string $slug
     * @param CreateCommentRequest $createCommentRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createComment(int $postId, string $slug, CreateCommentRequest $createCommentRequest)
    {
        return $this->userService->createComment($postId, $slug, $createCommentRequest->all());
    }
}
