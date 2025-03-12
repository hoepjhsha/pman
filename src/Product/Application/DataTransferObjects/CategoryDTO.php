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
 * @time 11:14 AM
 */

namespace App\Product\Application\DataTransferObjects;

class CategoryDTO
{
    private int $id;

    private ?int $parentId;

    private string $name;

    private ?string $description;

    public function __construct(int $id, ?int $parentId, string $name, ?string $description)
    {
        $this->id = $id;
        $this->parentId = $parentId;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CategoryDTO
    {
        $this->id = $id;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): CategoryDTO
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CategoryDTO
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): CategoryDTO
    {
        $this->description = $description;

        return $this;
    }
}
