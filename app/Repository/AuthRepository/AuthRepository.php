<?php

namespace App\Repository\AuthRepository;

use App\Models\BlogPost;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    protected $user;
    protected $comment;
    protected $blogPost;

    /**
     * @param $user
     * @param $comment
     * @param $blogPost
     */
    public function __construct(User $user, Comments $comment, BlogPost $blogPost)
    {
        $this->user = $user;
        $this->comment = $comment;
        $this->blogPost = $blogPost;
    }

    /**
     * @param array $user
     * @return mixed
     */
    public function creteUser(array $user)
    {
        $user['password'] = Hash::make($user['password']);
        return $this->user->create($user);
    }
}
