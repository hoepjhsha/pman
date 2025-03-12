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
 * @time 11:40 AM
 */

namespace App\Product\Application\UseCases\Product;

use App\Product\Application\DataTransferObjects\ProductDTO;
use App\Product\Domain\Entities\ProductEntity;
use App\Product\Domain\Services\Product\CreateOrUpdateProductServiceInterface;

readonly class CreateOrUpdateProductUseCase
{
    public function __construct(
        private CreateOrUpdateProductServiceInterface $createOrUpdateProductService,
    ) {
    }

    public function handle(ProductDTO $data, bool $isUpdate = false): array
    {
        try {
            $entity = new ProductEntity(
                $data->getId(),
                $data->getCategoryId(),
                $data->getName(),
                $data->getDescription(),
                $data->getPrice(),
                $data->getStock()
            );
            if ($this->createOrUpdateProductService->execute($entity)) {
                return [
                    'status' => 'success',
                    'message' => $isUpdate ? 'Updated product successful.' : 'Created product successful.',
                ];
            }

            return [
                'status' => 'failed',
                'message' => $isUpdate ? 'Updated product failed.' : 'Created product failed.',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'failed',
                'message' => 'An error occurred when '.($isUpdate ? 'update' : 'create').' product. '.$e->getMessage(),
            ];
        }
    }
}
