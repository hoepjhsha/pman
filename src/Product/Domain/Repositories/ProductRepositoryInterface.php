<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 8:24 AM
 */

namespace App\Product\Domain\Repositories;

use App\Product\Domain\Entities\ProductEntity;

interface ProductRepositoryInterface
{

    public function findAll(): array|null;

    public function findById(int $id): mixed;

    public function save(ProductEntity $data): bool;

    public function delete(int $id): bool;

}