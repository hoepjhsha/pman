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
 * @time 11:09 AM
 */

namespace App\Product\Application\UseCases\Category;

use App\Product\Domain\Services\Category\GetCategoryServiceInterface;

readonly class GetCategoryUseCase
{
    public function __construct(
        private GetCategoryServiceInterface $getCategoryService,
    ) {
    }

    public function handle(int $id): mixed
    {
        return $this->getCategoryService->execute($id) ?? [
            'status' => 'failed',
            'message' => 'No record found.',
        ];
    }
}
