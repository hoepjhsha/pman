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
 * @time 1:44 AM
 */

namespace App\Product\Infrastructure\Adapters\Persistence\Doctrine\Repositories;

use App\Product\Infrastructure\Adapters\Persistence\Doctrine\Entities\DoctrineCategoryEntity as Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class, 'product');
    }
}
