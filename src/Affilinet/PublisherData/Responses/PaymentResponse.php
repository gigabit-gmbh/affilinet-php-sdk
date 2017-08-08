<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Account;
use Affilinet\PublisherData\Responses\ResponseElements\Payment;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class PaymentResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class PaymentResponse extends AbstractSoapResponse {

    /** @var Payment $payment */
    protected $payment;

    /**
     * PaymentResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($this->getResponse()->PaymentInformationcollection)) {
            $this->payment = null;

            return;
        }

        $this->payment = new Account($this->getResponse()->PaymentInformationcollection);
    }

    /**
     * @return Payment|null
     */
    public function getPayment() {
        return $this->payment;
    }

}
