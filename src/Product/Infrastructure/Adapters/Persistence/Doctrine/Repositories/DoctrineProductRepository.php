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
 * @time 1:50 AM
 */

namespace App\Product\Infrastructure\Adapters\Persistence\Doctrine\Repositories;

use App\Product\Infrastructure\Adapters\Persistence\Doctrine\Entities\DoctrineProductEntity as Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }
}
