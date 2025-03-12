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
 * @time 10:22 AM
 */

namespace App\Product\Application\Services\Category;

use App\Product\Domain\Entities\CategoryEntity;
use App\Product\Domain\Repositories\CategoryRepositoryInterface;
use App\Product\Domain\Services\Category\CreateOrUpdateCategoryServiceInterface;

class CreateOrUpdateCategoryService implements CreateOrUpdateCategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(CategoryEntity $data): bool
    {
        try {
            return $this->categoryRepository->save($data);
        } catch (\Exception) {
            return false;
        }
    }
}
