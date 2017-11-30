<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;


/**
 * Class SubIdStatistic
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class SubIdStatistic {

    /**
     * @var \DateTime
     */
    protected $checkDate;

    /**
     * @var float
     */
    protected $commission;

    /**
     * @var float
     */
    protected $confirmed;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var integer
     */
    protected $number;

    /**
     *  If a sale was done on the advertiser’s platform, this is the value of the sale
     *
     * @var float
     */
    protected $price;

    /**
     * ID of the advertiser
     *
     * @var integer
     */
    protected $programId;

    /**
     * Name of the advertiser
     *
     * @var string
     */
    protected $programTitle;

    /**
     * The evaluated subID
     *
     *
     * @var string
     */
    protected $subId;

    /**
     * @var string
     */
    protected $transaction;

    /**
     * @var string
     */
    protected $transactionStatus;

    /**
     * SubIdStatistic constructor.
     */
    public function __construct($rawStatistic) {
        $this->setCheckDate($rawStatistic->CheckDate);
        $this->setCommission($rawStatistic->Commission);
        $this->setConfirmed($rawStatistic->Confirmed);
        $this->setDate($rawStatistic->Date);
        $this->setNumber($rawStatistic->Number);
        $this->setPrice($rawStatistic->Price);
        $this->setProgramId($rawStatistic->ProgramId);
        $this->setProgramTitle($rawStatistic->ProgramTitle);
        $this->setSubId($rawStatistic->SubId);
        $this->setTransaction($rawStatistic->Transaction);
        $this->setTransactionStatus($rawStatistic->TransactionStatus);
    }

    /**
     * @return \DateTime
     */
    public function getCheckDate() {
        return $this->checkDate;
    }

    /**
     * @param \DateTime $checkDate
     *
     * @return SubIdStatistic
     */
    public function setCheckDate($checkDate) {
        $this->checkDate = $checkDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getCommission() {
        return $this->commission;
    }

    /**
     * @param float $commission
     *
     * @return SubIdStatistic
     */
    public function setCommission($commission) {
        $this->commission = $commission;

        return $this;
    }

    /**
     * @return float
     */
    public function getConfirmed() {
        return $this->confirmed;
    }

    /**
     * @param float $confirmed
     *
     * @return SubIdStatistic
     */
    public function setConfirmed($confirmed) {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     *
     * @return SubIdStatistic
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber() {
        return $this->number;
    }

    /**
     * @param int $number
     *
     * @return SubIdStatistic
     */
    public function setNumber($number) {
        $this->number = $number;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return SubIdStatistic
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getProgramId() {
        return $this->programId;
    }

    /**
     * @param int $programId
     *
     * @return SubIdStatistic
     */
    public function setProgramId($programId) {
        $this->programId = $programId;

        return $this;
    }

    /**
     * @return string
     */
    public function getProgramTitle() {
        return $this->programTitle;
    }

    /**
     * @param string $programTitle
     *
     * @return SubIdStatistic
     */
    public function setProgramTitle($programTitle) {
        $this->programTitle = $programTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubId() {
        return $this->subId;
    }

    /**
     * @param string $subId
     *
     * @return SubIdStatistic
     */
    public function setSubId($subId) {
        $this->subId = $subId;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransaction() {
        return $this->transaction;
    }

    /**
     * @param string $transaction
     *
     * @return SubIdStatistic
     */
    public function setTransaction($transaction) {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionStatus() {
        return $this->transactionStatus;
    }

    /**
     * @param string $transactionStatus
     *
     * @return SubIdStatistic
     */
    public function setTransactionStatus($transactionStatus) {
        $this->transactionStatus = $transactionStatus;

        return $this;
    }


}