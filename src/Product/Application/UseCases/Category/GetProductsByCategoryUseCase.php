<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 11:30 AM
 */

namespace App\Product\Application\UseCases\Category;

use App\Product\Application\Services\Category\GetProductsByCategoryService;

readonly class GetProductsByCategoryUseCase
{

    public function __construct(
        private GetProductsByCategoryService $getProductsByCategoryService
    ) {
    }

    public function handle(int $id): array
    {
        return $this->getProductsByCategoryService->execute($id) ?? [
            'status'  => 'failed',
            'message' => 'No records found.',
        ];
    }

}