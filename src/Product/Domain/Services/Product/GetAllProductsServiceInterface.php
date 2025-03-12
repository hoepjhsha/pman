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
 * @time 10:13 AM
 */

namespace App\Product\Domain\Services\Product;

interface GetAllProductsServiceInterface
{
    public function execute(): ?array;
}
