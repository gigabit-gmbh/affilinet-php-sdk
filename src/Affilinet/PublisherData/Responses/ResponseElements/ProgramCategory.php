<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;


/**
 * Class ProgramCategory
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class ProgramCategory {

    /**
     * @var integer
     */
    private $id;

    /** @var  \DateTime */
    private $insertDate;

    /** @var  \DateTime */
    private $updateDate;

    /** @var  string */
    private $name;

    /** @var  integer */
    private $parentCategoryId;

    /** @var  integer */
    private $programs;

    /** @var  array<ProgramCategory> */
    private $subCategories;

    /**
     * ProgramCategory constructor.
     * @param object $category
     */
    public function __construct($category) {
        $this->id = $category->CategoryId;
        $this->insertDate = $category->DateInsert;
        $this->updateDate = $category->DateUpdate;
        $this->name = $category->Name;
        $this->parentCategoryId = $category->ParentCategoryId;
        $this->programs = $category->Programs;
        $this->subCategories = $this->setSubCategories($category->SubCategories);
    }

    /**
     * @param array <object>|object $subCategories
     * @return array
     */
    protected function setSubCategories($subCategories) {
        $categories = array();
        if (!isset($subCategories->ProgramCategory)) {
            return null;
        }
        $catDetail = $subCategories->ProgramCategory;
        if (is_array($catDetail)) {
            foreach ($catDetail as $commissionType) {
                $categories[] = new ProgramCategory($commissionType);
            }
        } else {
            $categories[] = new ProgramCategory($catDetail);
        }

        return $categories;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return ProgramCategory
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInsertDate() {
        return $this->insertDate;
    }

    /**
     * @param \DateTime $insertDate
     *
     * @return ProgramCategory
     */
    public function setInsertDate($insertDate) {
        $this->insertDate = $insertDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateDate() {
        return $this->updateDate;
    }

    /**
     * @param \DateTime $updateDate
     *
     * @return ProgramCategory
     */
    public function setUpdateDate($updateDate) {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ProgramCategory
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getParentCategoryId() {
        return $this->parentCategoryId;
    }

    /**
     * @param int $parentCategoryId
     *
     * @return ProgramCategory
     */
    public function setParentCategoryId($parentCategoryId) {
        $this->parentCategoryId = $parentCategoryId;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrograms() {
        return $this->programs;
    }

    /**
     * @param int $programs
     *
     * @return ProgramCategory
     */
    public function setPrograms($programs) {
        $this->programs = $programs;

        return $this;
    }

    /**
     * @return array
     */
    public function getSubCategories() {
        return $this->subCategories;
    }

}