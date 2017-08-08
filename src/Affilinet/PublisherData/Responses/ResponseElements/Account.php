<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;

/**
 * Class Account
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class  Account
{
    /**
     * @var float $accountBalance
     */
    private $accountBalance;

    /**
     * @var string $currency
     */
    private $currency;

    /**
     * @var string $mainUrl
     */
    private $mainUrl;


    public function __construct($account)
    {
        $this->accountBalance = $account->AccountBalance;
        $this->currency = $account->Currency;
        $this->mainUrl = $account->MainUrl;
    }

    /**
     * @return float
     */
    public function getAccountBalance() {
        return $this->accountBalance;
    }

    /**
     * @return string
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getMainUrl() {
        return $this->mainUrl;
    }



}
