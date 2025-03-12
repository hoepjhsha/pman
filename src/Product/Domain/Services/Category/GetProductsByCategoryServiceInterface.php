<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 10:17 AM
 */

namespace App\Product\Domain\Services\Category;

interface GetProductsByCategoryServiceInterface
{

    public function execute(int $id): array|null;

}