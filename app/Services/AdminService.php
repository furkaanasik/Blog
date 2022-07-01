<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\User;
use App\Repository\AdminRepository\AdminRepository;
use http\Encoding\Stream\Inflate;

class AdminService
{
    protected $adminRepository;

    /**
     * @param $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * @param array $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createBlogPost(array $post)
    {
        $posts = $this->adminRepository->creteBlogPost($post);
        return redirect()->route('admin.posts');
        //return view('Component.post', compact('post'));
    }

    /**
     * @param BlogPost $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditPostPage(BlogPost $post)
    {
        return view('Component.editPost', ['post' => $post, 'categories' => $this->adminRepository->getCategories(), 'checkedbox' => $post->category()->get()]);
    }

    /**
     * @param BlogPost $post
     * @param array $newpost
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateBlogPost(BlogPost $post, array $newpost)
    {
        $response = $this->adminRepository->updateBlogPost($post, $newpost);
        return redirect()->route('admin.posts');
    }

    /**
     * @param BlogPost $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBlogPost(BlogPost $post)
    {
        $response =  $this->adminRepository->deleteBlogPost($post);
        return redirect()->route('admin.posts');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreateBlogPostPage()
    {
        $categories = $this->adminRepository->getCategories();
        //$selectedID = 0;
        return view('Component.createPost', compact('categories'));
    }

    /**
     * @param array $createCategoryRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCategory(array $createCategoryRequest)
    {
        $response = $this->adminRepository->createCategory($createCategoryRequest);
        return redirect()->route('admin.show.create.page');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeUserRole(User $user)
    {
        $response = $this->adminRepository->changeUserRole($user);
        return redirect(url()->previous());
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteUser(User $user)
    {
        $response = $this->adminRepository->deleteUser($user);
        return redirect(url()->previous());
    }
}
