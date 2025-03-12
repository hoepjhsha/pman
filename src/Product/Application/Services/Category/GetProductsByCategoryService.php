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
 * @time 10:46 AM
 */

namespace App\Product\Application\Services\Category;

use App\Product\Domain\Repositories\CategoryRepositoryInterface;
use App\Product\Domain\Services\Category\GetProductsByCategoryServiceInterface;

class GetProductsByCategoryService implements GetProductsByCategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(int $id): ?array
    {
        return $this->categoryRepository->findAllProductsById($id);
    }
}
