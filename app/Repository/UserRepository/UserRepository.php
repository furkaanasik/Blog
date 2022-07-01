<?php

namespace App\Repository\UserRepository;

use App\Models\Comments;

class UserRepository implements UserRepositoryInterface
{

    protected $comment;

    /**
     * @param $comment
     */
    public function __construct(Comments $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param array $comment
     * @return mixed
     */
    public function createComment(array $comment)
    {
        return $this->comment->create($comment);
    }
}
