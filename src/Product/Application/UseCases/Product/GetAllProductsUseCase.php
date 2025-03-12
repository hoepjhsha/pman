<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 11:36 AM
 */

namespace App\Product\Application\UseCases\Product;

use App\Product\Domain\Services\Product\GetAllProductsServiceInterface;

readonly class GetAllProductsUseCase
{

    public function __construct(
        private GetAllProductsServiceInterface $getAllProductsService
    ) {
    }

    public function handle(): array
    {
        return $this->getAllProductsService->execute() ?? [
            'status'  => 'failed',
            'message' => 'No records found.',
        ];
    }

}