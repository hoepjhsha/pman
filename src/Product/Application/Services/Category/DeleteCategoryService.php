<?php

/**
 * @project pman
 *
 * @author hoep
 *
 * @email hiepnguyen3624@gmail.com
 *
 * @date 2025-03-12
 *
 * @time 10:23 AM
 */

namespace App\Product\Application\Services\Category;

use App\Product\Domain\Repositories\CategoryRepositoryInterface;
use App\Product\Domain\Services\Category\DeleteCategoryServiceInterface;

class DeleteCategoryService implements DeleteCategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(int $id): bool
    {
        try {
            return $this->categoryRepository->delete($id);
        } catch (\Exception) {
            return false;
        }
    }
}
