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
 * @time 9:08 AM
 */

namespace App\Product\Infrastructure\Adapters\Persistence\Repositories;

use App\Product\Domain\Entities\ProductEntity;
use App\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Product\Infrastructure\Adapters\Persistence\Doctrine\Entities\DoctrineCategoryEntity;
use App\Product\Infrastructure\Adapters\Persistence\Doctrine\Entities\DoctrineProductEntity;
use Doctrine\ORM\EntityManagerInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findAll(): ?array
    {
        return $this->em->getRepository(DoctrineProductEntity::class)->findAll();
    }

    public function findById(int $id): mixed
    {
        return $this->em->getRepository(DoctrineProductEntity::class)->find($id);
    }

    public function save(ProductEntity $data): bool
    {
        try {
            $this->em->beginTransaction();

            $doctrineProduct = $this->em->getRepository(DoctrineProductEntity::class)->find($data->getId());

            if (!$doctrineProduct) {
                $doctrineProduct = new DoctrineProductEntity();
            }

            $category = $this->em->getRepository(DoctrineCategoryEntity::class)->find($data->getCategoryId());

            if (!$category) {
                return false;
            }
            $doctrineProduct->setCategoryId($category);
            $doctrineProduct->setName($data->getName());
            $doctrineProduct->setDescription($data->getDescription());
            $doctrineProduct->setPrice($data->getPrice());
            $doctrineProduct->setStock($data->getStock());

            $this->em->persist($doctrineProduct);
            $this->em->flush();
            $this->em->commit();

            return true;
        } catch (\Exception) {
            $this->em->rollback();

            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->em->beginTransaction();

            $doctrineProduct = $this->em->getRepository(DoctrineProductEntity::class)->find($id);

            if (null === $doctrineProduct) {
                return false;
            }

            $this->em->remove($doctrineProduct);
            $this->em->flush();
            $this->em->commit();

            return true;
        } catch (\Exception) {
            $this->em->rollback();

            return false;
        }
    }
}
