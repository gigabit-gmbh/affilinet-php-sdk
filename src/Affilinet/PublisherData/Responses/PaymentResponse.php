<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Payment;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class PaymentResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class PaymentResponse extends AbstractSoapResponse {

    /** @var array<Payment> $payments */
    protected $payments;

    /**
     * PaymentResponse constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($response->PaymentInformationcollection)) {
            $this->payments = null;

            return;
        }

        $this->payments = array();
        $paymentInformationResponse = $response->PaymentInformationcollection->PaymentInformation;
        if (is_array($paymentInformationResponse)) {
            foreach ($paymentInformationResponse as $paymentInformation) {
                array_push($this->payments, new Payment($paymentInformation));
            }
        } else {
            array_push($this->payments, new Payment($paymentInformationResponse));
        }
    }

    /**
     * @return array<Payment>|null
     */
    public function getPayments() {
        return $this->payments;
    }

}
