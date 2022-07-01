<?php

namespace App\Repository\AdminRepository;

use App\Models\BlogPost;
use App\Models\User;

interface AdminRepositoryInterface
{
    public function creteBlogPost(array $post);
    public function deleteBlogPost(BlogPost $post);
    public function updateBlogPost(BlogPost $post, array $newpost);
    public function createCategory(array $category);
    public function changeUserRole(User $user);
    public function deleteUser(User $user);
}
