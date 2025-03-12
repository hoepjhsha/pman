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
 * @time 10:43 AM
 */

namespace App\Product\Application\Services\Product;

use App\Product\Domain\Entities\ProductEntity;
use App\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Product\Domain\Services\Product\CreateOrUpdateProductServiceInterface;

class CreateOrUpdateProductService implements CreateOrUpdateProductServiceInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(ProductEntity $data): bool
    {
        try {
            return $this->productRepository->save($data);
        } catch (\Exception) {
            return false;
        }
    }
}
