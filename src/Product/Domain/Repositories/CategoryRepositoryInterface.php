<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 8:20 AM
 */

namespace App\Product\Domain\Repositories;

use App\Product\Domain\Entities\CategoryEntity;

interface CategoryRepositoryInterface
{

    public function findAll(): array|null;

    public function findById(int $id): mixed;

    public function save(CategoryEntity $data): bool;

    public function delete(int $id): bool;

    public function findChildren(int $id): array|null;

    public function findParent(int $id): mixed;

    public function findAllProductsById(int $id): array|null;

}