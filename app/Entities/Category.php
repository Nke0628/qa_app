<?php

namespace App\Entities;

class Category
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $categoryName;

    /**
     * @var string
     */
    protected $updateDate;

    /**
     * Category constructor.
     * @param int $id
     * @param string $categoryName
     * @param string $updateDate
     */
    public function __construct(int $id, string $categoryName, string $updateDate = null)
    {
        $this->id = $id;
        $this->categoryName = $categoryName;
        $this->updateDate = $updateDate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @return string
     */
    public function getUpdateDate(): ?string
    {
        return $this->updateDate;
    }
}
