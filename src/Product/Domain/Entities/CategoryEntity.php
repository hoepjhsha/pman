<?php
/**
 * @project pman
 * @author hoep
 * @email hiepnguyen3624@gmail.com
 * @date 2025-03-12
 * @time 8:12 AM
 */

namespace App\Product\Domain\Entities;

use DateTimeImmutable;

class CategoryEntity
{

    private int $id;

    private ?int $parentId;

    private string $name;

    private ?string $description;

    /**
     * @param  int  $id
     * @param  int|null  $parentId
     * @param  string  $name
     * @param  string|null  $description
     */
    public function __construct(
        int $id,
        ?int $parentId,
        string $name,
        ?string $description,
    ) {
        $this->id = $id;
        $this->parentId = $parentId;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CategoryEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): CategoryEntity
    {
        $this->parentId = $parentId;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CategoryEntity
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): CategoryEntity
    {
        $this->description = $description;
        return $this;
    }

}