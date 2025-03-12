<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 10:44 AM
 */

namespace App\Product\Application\Services\Product;

use App\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Product\Domain\Services\Product\DeleteProductServiceInterface;
use Exception;

class DeleteProductService implements DeleteProductServiceInterface
{

    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id): bool
    {
        try {
            return $this->productRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }

}