<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;

/**
 * Class PaymentDetailInformation
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class  PaymentDetailInformation {

    /**
     * @var int $paymentDetailId
     */
    private $paymentDetailId;

    /**
     * @var int $publisherId
     */
    private $publisherId;

    /**
     * @var float $net
     */
    private $net;

    public function __construct($paymentDetailInformation) {
        $this->paymentDetailId = $paymentDetailInformation->PaymentDetailId;
        $this->net = $paymentDetailInformation->Net;
        $this->publisherId = $paymentDetailInformation->PublisherId;
    }

    /**
     * @return int
     */
    public function getPaymentDetailId() {
        return $this->paymentDetailId;
    }

    /**
     * @return int
     */
    public function getPublisherId() {
        return $this->publisherId;
    }

    /**
     * @return float
     */
    public function getNet() {
        return $this->net;
    }


}
