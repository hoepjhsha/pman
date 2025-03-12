<?php

declare(strict_types=1);

namespace App\Product\Infrastructure\Adapters\Http\Controllers;

use App\Product\Application\UseCases\Category\CreateOrUpdateCategoryUseCase;
use App\Product\Application\UseCases\Category\DeleteCategoryUseCase;
use App\Product\Application\UseCases\Category\GetAllCategoriesUseCase;
use App\Product\Application\UseCases\Category\GetCategoryUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/category', name: 'category-')]
class CategoryController extends AbstractController
{
    public function __construct(
        private readonly SerializerInterface $serializer,

        private readonly GetAllCategoriesUseCase $getAllCategoriesUseCase,
        private readonly GetCategoryUseCase $getCategoryUseCase,
        private readonly CreateOrUpdateCategoryUseCase $createOrUpdateCategoryUseCase,
        private readonly DeleteCategoryUseCase $deleteCategoryUseCase,
    ) {
    }

    /**
     * @throws \JsonException
     */
    #[Route('/', name: 'get_all', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $data = $this->getAllCategoriesUseCase->handle();

        return $this->serialize($data);
    }

    /**
     * @throws \JsonException
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->getCategoryUseCase->handle($id);

        return $this->serialize($data);
    }

    /**
     * @throws \JsonException
     */
    private function serialize(mixed $data): JsonResponse
    {
        $serializedData = $this->serializer->serialize($data, 'json', ['group' => 'category']);

        $decodedData = json_decode($serializedData, true, 512, JSON_THROW_ON_ERROR);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return new JsonResponse(['error' => 'Invalid JSON data'], 500);
        }

        $prettyJson = json_encode($decodedData, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return new JsonResponse(['error' => 'Error encoding JSON'], 500);
        }

        return new JsonResponse($prettyJson, 200, [], true);
    }
}
