<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogPostRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use App\Models\User;
use App\Services\AdminService;


class AdminController extends Controller
{
    protected $adminService;

    /**
     * @param $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreateBlogPostPage()
    {
        return $this->adminService->showCreateBlogPostPage();
    }

    /**
     * @param CreateBlogPostRequest $createBlogPostRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createBlogPost(CreateBlogPostRequest $createBlogPostRequest)
    {
        return $this->adminService->createBlogPost($createBlogPostRequest->only('categories', 'slug', 'title', 'body'));
    }

    /**
     * @param BlogPost $blogPost
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditPostPage(BlogPost $blogPost)
    {
        return $this->adminService->showEditPostPage($blogPost);
    }

    /**
     * @param BlogPost $post
     * @param UpdateBlogPostRequest $updateBlogPostRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateBlogPost(BlogPost $post, UpdateBlogPostRequest $updateBlogPostRequest)
    {
        return $this->adminService->updateBlogPost($post, $updateBlogPostRequest->only('categories', 'slug', 'title', 'body'));
    }

    /**
     * @param BlogPost $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBlogPost(BlogPost $post)
    {
        return $this->adminService->deleteBlogPost($post);
    }

    /**
     * @param CreateCategoryRequest $createCategoryRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCategory(CreateCategoryRequest $createCategoryRequest)
    {
        return $this->adminService->createCategory($createCategoryRequest->only('name', 'slug'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeUserRole(User $user)
    {
        return $this->adminService->changeUserRole($user);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteUser(User $user)
    {
        return $this->adminService->deleteUser($user);
    }
}
