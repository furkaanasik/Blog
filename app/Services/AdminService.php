<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\User;
use App\Repository\AdminRepository\AdminRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class AdminService
{
    protected AdminRepositoryInterface $adminRepository;

    /**
     * @param AdminRepositoryInterface $adminRepository
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * @param array $post
     * @return mixed
     */
    public function createBlogPost(array $post)
    {
        return $this->adminRepository->creteBlogPost($post);
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->adminRepository->getCategories();
    }

    /**
     * @param BlogPost $post
     * @param array $newpost
     * @return BlogPost
     */
    public function updateBlogPost(BlogPost $post, array $newpost)
    {
        return $this->adminRepository->updateBlogPost($post, $newpost);
    }

    /**
     * @param BlogPost $post
     * @return bool
     */
    public function deleteBlogPost(BlogPost $post)
    {
        return $this->adminRepository->deleteBlogPost($post);
    }

    /**
     * @param array $createCategoryRequest
     * @return RedirectResponse
     */
    public function createCategory(array $createCategoryRequest)
    {
        return $this->adminRepository->createCategory($createCategoryRequest);

    }

    /**
     * @param User $user
     * @return bool
     */
    public function changeUserRole(User $user)
    {
        return $this->adminRepository->changeUserRole($user);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function deleteUser(User $user)
    {
        return $this->adminRepository->deleteUser($user);
    }
}
