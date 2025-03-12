<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 11:44 AM
 */

namespace App\Product\Application\UseCases\Product;

use App\Product\Domain\Services\Product\DeleteProductServiceInterface;
use Exception;

readonly class DeleteProductUseCase
{

    public function __construct(
        private DeleteProductServiceInterface $deleteProductService
    ) {
    }

    public function handle(int $id): array
    {
        try {
            if ($this->deleteProductService->execute($id)) {
                return [
                    'status'  => 'success',
                    'message' => 'Delete product successful.',
                ];
            }

            return [
                'status'  => 'failed',
                'message' => 'Delete product successful.',
            ];
        } catch (Exception $e) {
            return [
                'status'  => 'failed',
                'message' => 'An error occurred when delete product. '.$e->getMessage(),
            ];
        }
    }

}