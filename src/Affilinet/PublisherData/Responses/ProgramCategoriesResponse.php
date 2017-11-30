<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Program;
use Affilinet\PublisherData\Responses\ResponseElements\ProgramCategory;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class ProgramCategoriesResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class ProgramCategoriesResponse extends AbstractSoapResponse {

    /** @var array<Program> $programs */
    protected $programCategories;

    /**
     * CreativeResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($response->RootCategories)) {
            $this->programCategories = null;

            return;
        }

        $this->programCategories = array();

        $programCategoryResponse = $response->RootCategories->ProgramCategory;
        if (is_array($programCategoryResponse)) {
            foreach ($programCategoryResponse as $program) {
                array_push($this->programCategories, new ProgramCategory($program));
            }
        } else {
            array_push($this->programCategories, new ProgramCategory($programCategoryResponse));

        }
    }

    /**
     * @return array<Program>|null
     */
    public function getProgramCategories() {
        return $this->programCategories;
    }

}
