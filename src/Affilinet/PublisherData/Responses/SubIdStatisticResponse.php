<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Program;
use Affilinet\PublisherData\Responses\ResponseElements\SubIdStatistic;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class SubIdStatisticResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class SubIdStatisticResponse extends AbstractSoapResponse {

    /** @var array<SubIdStatistic> $records */
    protected $statistics;

    /**
     * If a sale was done on the advertiser’s platform, this is the value of the sale
     *
     * @var float $totalPrice
     */
    protected $totalPrice;

    /**
     * The total amount of money earned with this SubID
     *
     * @var float $totalPayment
     */
    protected $totalPayment;

    /**
     * SubIdStatisticResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($response->Records)) {
            $this->statistics = null;
            $this->totalPayment = 0;
            $this->totalPrice = 0;

            return;
        }

        $this->totalPayment = $response->TotalPayment;
        $this->totalPrice = $response->TotalPrice;

        $this->statistics = array();

        $subIdStatisticResponse = $response->Records->SubIdStatisticsRecord;
        if (is_array($subIdStatisticResponse)) {
            foreach ($subIdStatisticResponse as $subIdStatistic) {
                array_push($this->statistics, new SubIdStatistic($subIdStatistic));
            }
        } else {
            array_push($this->statistics, new SubIdStatistic($subIdStatisticResponse));

        }
    }

    /**
     * @return array
     */
    public function getStatistics() {
        return $this->statistics;
    }

    /**
     * @return float
     */
    public function getTotalPrice() {
        return $this->totalPrice;
    }

    /**
     * @return float
     */
    public function getTotalPayment() {
        return $this->totalPayment;
    }


}
