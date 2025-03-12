<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 8:15 AM
 */

namespace App\Product\Domain\Entities;

use DateTimeImmutable;

class ProductEntity
{

    private int $id;

    private int $categoryId;

    private string $name;

    private ?string $description;

    private int $price;

    private int $stock;

    /**
     * @param  int  $id
     * @param  int  $categoryId
     * @param  string  $name
     * @param  string|null  $description
     * @param  int  $price
     * @param  int  $stock
     */
    public function __construct(
        int $id,
        int $categoryId,
        string $name,
        ?string $description,
        int $price,
        int $stock,
    ) {
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ProductEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): ProductEntity
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ProductEntity
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): ProductEntity
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): ProductEntity
    {
        $this->price = $price;
        return $this;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): ProductEntity
    {
        $this->stock = $stock;
        return $this;
    }

}