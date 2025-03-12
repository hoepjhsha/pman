<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 10:18 AM
 */

namespace App\Product\Application\Services\Category;

use App\Product\Domain\Repositories\CategoryRepositoryInterface;
use App\Product\Domain\Services\Category\GetAllCategoriesServiceInterface;

class GetAllCategoriesService implements GetAllCategoriesServiceInterface
{

    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(): array|null
    {
        return $this->categoryRepository->findAll();
    }

}