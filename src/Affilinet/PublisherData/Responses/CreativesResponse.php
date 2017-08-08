<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Account;
use Affilinet\PublisherData\Responses\ResponseElements\Creative;
use Affilinet\PublisherData\Responses\ResponseElements\CreativeCategory;
use Affilinet\PublisherData\Responses\ResponseElements\Payment;
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
        foreach($response->CreativeCollection->Creative as $creative){
            array_push($this->creatives, new Creative($creative));
        }
    }

    /**
     * @return array<CreativeCategory>|null
     */
    public function getCreatives() {
        return $this->creatives;
    }

}
