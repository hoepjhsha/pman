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
 * @time 11:00 AM
 */

namespace App\Product\Application\UseCases\Category;

use App\Product\Domain\Services\Category\GetAllCategoriesServiceInterface;

readonly class GetAllCategoriesUseCase
{
    public function __construct(
        private GetAllCategoriesServiceInterface $getAllCategoriesService,
    ) {
    }

    public function handle(): ?array
    {
        return $this->getAllCategoriesService->execute() ?? [
            'status' => 'failed',
            'message' => 'No records found.',
        ];
    }
}
