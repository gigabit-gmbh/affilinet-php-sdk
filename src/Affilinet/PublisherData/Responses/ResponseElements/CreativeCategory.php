<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;

/**
 * Class CreativeCategory
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class  CreativeCategory {

    /**
     * @var int $categoryId
     */
    private $categoryId;

    /**
     * @var int $programId
     */
    private $programId;

    /**
     * @var int $parentId
     */
    private $parentId;

    /**
     * @var string $categoryName
     */
    private $categoryName;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var int $creativeCount
     */
    private $creativeCount;

    /**
     * @var bool $powerLinkCategory
     */
    private $powerLinkCategory;

    public function __construct($account) {
        $this->categoryId = $account->CategoryId;
        $this->programId = $account->ProgramId;
        $this->parentId = $account->ParentId;
        $this->categoryName = $account->CategoryName;
        $this->description = $account->Description;
        $this->creativeCount = $account->CreativeCount;
        $this->powerLinkCategory = $account->IsPowerlinkCategory;
    }

    /**
     * @return int
     */
    public function getCategoryId() {
        return $this->categoryId;
    }

    /**
     * @return int
     */
    public function getProgramId() {
        return $this->programId;
    }

    /**
     * @return int
     */
    public function getParentId() {
        return $this->parentId;
    }

    /**
     * @return string
     */
    public function getCategoryName() {
        return $this->categoryName;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getCreativeCount() {
        return $this->creativeCount;
    }

    /**
     * @return bool
     */
    public function isPowerLinkCategory() {
        return $this->powerLinkCategory;
    }


}
