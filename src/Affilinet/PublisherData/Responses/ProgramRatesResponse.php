<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\ProgramRate;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class ProgramRatesResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class ProgramRatesResponse extends AbstractSoapResponse {

    /** @var array<Program> $programs */
    protected $rates;

    /**
     * CreativeResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($response->RateCollection)) {
            $this->rates = null;

            return;
        }

        $this->rates = array();

        $rateResponse = $response->RateCollection;
        if (is_array($rateResponse)) {
            foreach ($rateResponse as $rate) {
                array_push($this->rates, new ProgramRate($rate));
            }
        } else {
            array_push($this->rates, new ProgramRate($rateResponse));

        }
    }

    /**
     * @return array<Program>|null
     */
    public function getRates() {
        return $this->rates;
    }

}
