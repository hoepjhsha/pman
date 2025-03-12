<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 10:16 AM
 */

namespace App\Product\Domain\Services\Product;

interface DeleteProductServiceInterface
{

    public function execute(int $id): bool;

}