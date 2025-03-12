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
 * @time 11:11 AM
 */

namespace App\Product\Application\UseCases\Category;

use App\Product\Application\DataTransferObjects\CategoryDTO;
use App\Product\Domain\Entities\CategoryEntity;
use App\Product\Domain\Services\Category\CreateOrUpdateCategoryServiceInterface;

readonly class CreateOrUpdateCategoryUseCase
{
    public function __construct(
        private CreateOrUpdateCategoryServiceInterface $createOrUpdateCategoryService,
    ) {
    }

    public function handle(CategoryDTO $data, bool $isUpdate = false): array
    {
        try {
            $entity = new CategoryEntity(
                $data->getId(), $data->getParentId(), $data->getName(), $data->getDescription()
            );
            if ($this->createOrUpdateCategoryService->execute($entity)) {
                return [
                    'status' => 'success',
                    'message' => $isUpdate ? 'Updated category successful.' : 'Created category successful.',
                ];
            }

            return [
                'status' => 'failed',
                'message' => $isUpdate ? 'Updated category failed.' : 'Created category failed.',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'failed',
                'message' => 'An error occurred when '.($isUpdate ? 'update' : 'create').' category. '.$e->getMessage(),
            ];
        }
    }
}
