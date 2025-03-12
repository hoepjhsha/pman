<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 9:51 AM
 */

namespace App\Product\Domain\Services\Category;

interface GetAllCategoriesServiceInterface
{

    public function execute(): array|null;

}