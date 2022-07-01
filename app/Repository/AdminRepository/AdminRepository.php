<?php

namespace App\Repository\AdminRepository;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\User;

class AdminRepository implements AdminRepositoryInterface
{
    protected $blogPost;
    protected $category;

    /**
     * @param $blogPost
     */
    public function __construct(BlogPost $blogPost, Category $category)
    {
        $this->blogPost = $blogPost;
        $this->category = $category;
    }

    /**
     * @param array $post
     * @return mixed
     */
    public function creteBlogPost(array $post)
    {
        $categoryList = $post['categories'];
        $newPost = $this->blogPost->create(['slug' => $post['slug'],'title' => $post['title'], 'body' => $post['body']]);
        $newPost->category()->attach($categoryList);
        return $newPost;
    }

    /**
     * @param BlogPost $post
     * @param array $newpost
     * @return BlogPost
     */
    public function updateBlogPost(BlogPost $post, array $newpost)
    {
        $categoryList = $newpost['categories'];
        $post->slug = $newpost['slug'];
        $post->title = $newpost['title'];
        $post->body = $newpost['body'];

        $post->save();
        $post->category()->sync($categoryList);
        return $post;
    }

    /**
     * @param BlogPost $post
     * @return bool|null
     */
    public function deleteBlogPost(BlogPost $post)
    {
        return $post->delete();
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->category->pluck("name", "id");
    }

    /**
     * @param array $category
     * @return mixed
     */
    public function createCategory(array $category)
    {
        return $this->category->create($category);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function changeUserRole(User $user)
    {
        if($user->role_as == 0)
        {
            $user->role_as = 1;
        }

        else if($user->role_as == 1)
        {
            $user->role_as = 0;
        }

        return $user->save();

    }

    /**
     * @param User $user
     * @return bool|null
     */
    public function deleteUser(User $user)
    {
        return $user->delete();
    }
}
