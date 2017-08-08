<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;

/**
 * Class Payment
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class  Payment {

    /**
     * @var int $paymentId
     */
    private $paymentId;

    /**
     * @var string $currency
     */
    private $currency;

    /**
     * @var float $grossTotal
     */
    private $grossTotal;

    /**
     * @var float $vatTotal
     */
    private $vatTotal;

    /**
     * @var float $netTotal
     */
    private $netTotal;

    /**
     * @var \DateTime $paidDate
     */
    private $paidDate;

    /**
     * @var \DateTime $paymentDate
     */
    private $paymentDate;

    /**
     * @var string $paymentStatus
     */
    private $paymentStatus;

    /**
     * @var string $paymentType
     */
    private $paymentType;

    /**
     * @var array<PaymentDetailInformation> $paymentDetailInformationCollection
     */
    private $paymentDetailInformationCollection;

    public function __construct($account) {
        $this->paymentId = $account->PaymentId;
        $this->grossTotal = $account->GrossTotal;
        $this->netTotal = $account->NetTotal;
        $this->currency = $account->Currency;
        $this->paidDate = $account->PaidDate;
        $this->paymentDate = $account->PaymentDate;
        $this->paymentDetailInformationCollection = $this->setPaymentDetailInformation($account->PaymentDetailInformationCollection);
        $this->paymentStatus = $account->PaymentStatus;
        $this->paymentType = $account->PaymentType;
        $this->vatTotal = $account->VATTotal;
    }

    protected function setPaymentDetailInformation($paymentDetailInformationCollection) {
        $detailInformation = array();

        foreach ($paymentDetailInformationCollection as $paymentDetailInformation) {
            array_push($detailInformation, new PaymentDetailInformation($paymentDetailInformation));
        }

        return $detailInformation;
    }

    /**
     * @return int
     */
    public function getPaymentId() {
        return $this->paymentId;
    }

    /**
     * @return string
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getGrossTotal() {
        return $this->grossTotal;
    }

    /**
     * @return float
     */
    public function getVatTotal() {
        return $this->vatTotal;
    }

    /**
     * @return float
     */
    public function getNetTotal() {
        return $this->netTotal;
    }

    /**
     * @return \DateTime
     */
    public function getPaidDate() {
        return $this->paidDate;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDate() {
        return $this->paymentDate;
    }

    /**
     * @return string
     */
    public function getPaymentStatus() {
        return $this->paymentStatus;
    }

    /**
     * @return string
     */
    public function getPaymentType() {
        return $this->paymentType;
    }

    /**
     * @return array
     */
    public function getPaymentDetailInformationCollection() {
        return $this->paymentDetailInformationCollection;
    }


}
