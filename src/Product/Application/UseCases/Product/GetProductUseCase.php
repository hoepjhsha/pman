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
 * @time 11:38 AM
 */

namespace App\Product\Application\UseCases\Product;

use App\Product\Domain\Services\Product\GetProductServiceInterface;

readonly class GetProductUseCase
{
    public function __construct(
        private GetProductServiceInterface $getProductService,
    ) {
    }

    public function handle(int $id): mixed
    {
        return $this->getProductService->execute($id) ?? [
            'status' => 'failed',
            'message' => 'No record found.',
        ];
    }
}
