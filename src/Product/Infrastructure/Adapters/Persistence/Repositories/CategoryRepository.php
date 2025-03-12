<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 8:31 AM
 */

namespace App\Product\Infrastructure\Adapters\Persistence\Repositories;

use App\Product\Domain\Entities\CategoryEntity;
use App\Product\Domain\Repositories\CategoryRepositoryInterface;
use App\Product\Infrastructure\Adapters\Persistence\Doctrine\Entities\DoctrineCategoryEntity;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

class CategoryRepository implements CategoryRepositoryInterface
{

    private $em;

    public function __construct(ManagerRegistry $m)
    {
        $this->em = $m->getManager('product');
    }

    public function findAll(): array|null
    {
        return $this->em->getRepository(DoctrineCategoryEntity::class)->findAll();
    }

    public function findById(int $id): mixed
    {
        return $this->em->getRepository(DoctrineCategoryEntity::class)->find($id);
    }

    public function save(CategoryEntity $data): bool
    {
        try {
            $this->em->beginTransaction();

            $doctrineCategory = $this->em->getRepository(DoctrineCategoryEntity::class)->find($data->getId());

            if (!$doctrineCategory) {
                $doctrineCategory = new DoctrineCategoryEntity();
            }

            $doctrineCategory->setParentId($data->getParentId());
            $doctrineCategory->setName($data->getName());
            $doctrineCategory->setDescription($data->getDescription());

            $this->em->persist($doctrineCategory);
            $this->em->flush();
            $this->em->commit();

            return true;
        } catch (Exception) {
            $this->em->rollback();
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->em->beginTransaction();

            $doctrineCategory = $this->em->getRepository(DoctrineCategoryEntity::class)->find($id);

            if ($doctrineCategory === null) {
                return false;
            }

            $this->em->remove($doctrineCategory);
            $this->em->flush();
            $this->em->commit();

            return true;
        } catch (Exception) {
            $this->em->rollback();
            return false;
        }
    }

    public function findChildren(int $id): array|null
    {
        return $this->em->getRepository(DoctrineCategoryEntity::class)->find($id)?->getChildren();
    }

    public function findParent(int $id): mixed
    {
        return $this->em->getRepository(DoctrineCategoryEntity::class)->find($id)?->getParentId();
    }

    public function findAllProductsById(int $id): array|null
    {
        return $this->em->getRepository(DoctrineCategoryEntity::class)->find($id)?->getProducts();
    }

}