<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Creative;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class CreativeResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class CreativesResponse extends AbstractSoapResponse {

    /** @var array<Creative> $creative */
    protected $creatives;

    /** @var int $totalResults */
    protected $totalResults;

    /**
     * CreativeResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($response->TotalResults)) {
            $this->creatives = null;
            $this->totalResults = 0;

            return;
        }

        $this->totalResults = $response->TotalResults;

        $this->creatives = array();
        $creativeResponse = $response->CreativeCollection->Creative;
        if (is_array($creativeResponse)) {
            foreach ($creativeResponse as $creative) {
                array_push($this->creatives, new Creative($creative));
            }
        } else {
            array_push($this->creatives, new Creative($creativeResponse));
        }

    }

    /**
     * @return array<Creative>|null
     */
    public function getCreatives() {
        return $this->creatives;
    }

}
