<?php

namespace App\Services;

use App\Repository\UserRepository\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserServices
{
    protected $userRepository;

    /**
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $postId
     * @param string $slug
     * @param array $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createComment(int $postId, string $slug, array $comment)
    {
        if(Auth::check())
        {
            $userMail = \auth()->user()->email;
            $commentStructure = ['blog_post_id' => $postId, 'owner' => $userMail, 'body' => $comment['body']];
            $response = $this->userRepository->createComment($commentStructure);
            return redirect()->route('get.post', [$slug]);
        }

        else
        {
            return redirect()->route('login');
        }
    }
}
