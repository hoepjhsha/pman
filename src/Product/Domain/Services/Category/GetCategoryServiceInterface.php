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
 * @time 9:56 AM
 */

namespace App\Product\Domain\Services\Category;

interface GetCategoryServiceInterface
{
    public function execute(int $id): mixed;
}
