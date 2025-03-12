<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 10:15 AM
 */

namespace App\Product\Domain\Services\Product;

use App\Product\Domain\Entities\ProductEntity;

interface CreateOrUpdateProductServiceInterface
{

    public function execute(ProductEntity $data): bool;

}