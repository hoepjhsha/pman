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
 * @time 11:28 AM
 */

namespace App\Product\Application\UseCases\Category;

use App\Product\Domain\Services\Category\DeleteCategoryServiceInterface;

readonly class DeleteCategoryUseCase
{
    public function __construct(
        private DeleteCategoryServiceInterface $deleteCategoryService,
    ) {
    }

    public function handle(int $id): array
    {
        try {
            if ($this->deleteCategoryService->execute($id)) {
                return [
                    'status' => 'success',
                    'message' => 'Delete category successful.',
                ];
            }

            return [
                'status' => 'failed',
                'message' => 'Delete category successful.',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'failed',
                'message' => 'An error occurred when delete category. '.$e->getMessage(),
            ];
        }
    }
}
