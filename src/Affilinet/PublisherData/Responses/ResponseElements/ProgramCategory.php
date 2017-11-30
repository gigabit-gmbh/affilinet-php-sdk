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


}