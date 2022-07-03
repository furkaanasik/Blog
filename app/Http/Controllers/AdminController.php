<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogPostRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    protected AdminService $adminService;

    /**
     * @param AdminService $adminService
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * @return View
     */
    public function showCreateBlogPostPage(): View
    {
        $response = $this->adminService->getCategories();
        return view('Component.createPost', [
            'categories' => $response,
        ]);
    }

    /**
     * @param CreateBlogPostRequest $createBlogPostRequest
     * @return RedirectResponse
     */
    public function createBlogPost(CreateBlogPostRequest $createBlogPostRequest): RedirectResponse
    {
        $response = $this->adminService->createBlogPost($createBlogPostRequest->only('categories', 'slug', 'title', 'body'));
        return redirect()->route('admin.posts');
    }

    /**
     * @param BlogPost $blogPost
     * @return View
     */
    public function showEditPostPage(BlogPost $blogPost): View
    {
        $categories = $this->adminService->getCategories();
        return view('Component.editPost', [
            'post' => $blogPost,
            'categories' => $categories,
            'checkedbox' => $blogPost->category()->get()
        ]);
    }

    /**
     * @param BlogPost $post
     * @param UpdateBlogPostRequest $updateBlogPostRequest
     * @return RedirectResponse
     */
    public function updateBlogPost(BlogPost $post, UpdateBlogPostRequest $updateBlogPostRequest): RedirectResponse
    {
        $response = $this->adminService->updateBlogPost($post, $updateBlogPostRequest->only('categories', 'slug', 'title', 'body'));
        return redirect()->route('admin.posts');
    }

    /**
     * @param BlogPost $post
     * @return RedirectResponse
     */
    public function deleteBlogPost(BlogPost $post): RedirectResponse
    {
        $response = $this->adminService->deleteBlogPost($post);
        return redirect()->route('admin.posts');
    }

    /**
     * @param CreateCategoryRequest $createCategoryRequest
     * @return RedirectResponse
     */
    public function createCategory(CreateCategoryRequest $createCategoryRequest): RedirectResponse
    {
        $response =  $this->adminService->createCategory($createCategoryRequest->only('name', 'slug'));
        return redirect()->route('admin.show.create.page');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function changeUserRole(User $user): RedirectResponse
    {
        $response = $this->adminService->changeUserRole($user);
        return redirect(url()->previous());
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function deleteUser(User $user): RedirectResponse
    {
        $response =  $this->adminService->deleteUser($user);
        return redirect(url()->previous());
    }
}
