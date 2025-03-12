<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 10:08 AM
 */

namespace App\Product\Domain\Services\Category;

use App\Product\Domain\Entities\CategoryEntity;

interface CreateOrUpdateCategoryServiceInterface
{

    public function execute(CategoryEntity $data): bool;

}