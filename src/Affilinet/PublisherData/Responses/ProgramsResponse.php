<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Program;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class ProgramsResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class ProgramsResponse extends AbstractSoapResponse {

    /** @var array<Program> $programs */
    protected $programs;

    /** @var int $totalResults */
    protected $totalResults;

    /**
     * CreativeResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($response->TotalResults)) {
            $this->programs = null;
            $this->totalResults = 0;

            return;
        }

        $this->totalResults = $response->TotalResults;

        $this->programs = array();

        $programResponse = $response->ProgramCollection->Program;
        if (is_array($programResponse)) {
            foreach ($programResponse as $program) {
                array_push($this->programs, new Program($program));
            }
        } else {
            array_push($this->programs, new Program($programResponse));

        }
    }

    /**
     * @return array<Program>|null
     */
    public function getPrograms() {
        return $this->programs;
    }

}
