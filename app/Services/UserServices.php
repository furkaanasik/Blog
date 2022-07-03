<?php

namespace App\Services;

use App\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserServices
{
    protected UserRepositoryInterface $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $postId
     * @param string $slug
     * @param array $comment
     * @return bool
     */
    public function createComment(int $postId, string $slug, array $comment)
    {
        if(Auth::check())
        {
            $userMail = \auth()->user()->email;
            $commentStructure = ['blog_post_id' => $postId, 'owner' => $userMail, 'body' => $comment['body']];
            $this->userRepository->createComment($commentStructure);
            return true;
        }

        else
        {
            return false;
        }
    }
}
