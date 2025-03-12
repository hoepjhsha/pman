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
 * @time 10:24 AM
 */

namespace App\Product\Application\Services\Product;

use App\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Product\Domain\Services\Product\GetAllProductsServiceInterface;

class GetAllProductsService implements GetAllProductsServiceInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(): ?array
    {
        return $this->productRepository->findAll();
    }
}
