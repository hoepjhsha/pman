<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 10:20 AM
 */

namespace App\Product\Application\Services\Category;

use App\Product\Domain\Repositories\CategoryRepositoryInterface;
use App\Product\Domain\Services\Category\GetCategoryServiceInterface;

class GetCategoryService implements GetCategoryServiceInterface
{

    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(int $id): mixed
    {
        return $this->categoryRepository->findById($id);
    }

}