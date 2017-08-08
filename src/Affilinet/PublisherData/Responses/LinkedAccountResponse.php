<?php

namespace Affilinet\PublisherData\Responses;

use Affilinet\PublisherData\Responses\ResponseElements\Account;
use Affilinet\Responses\AbstractSoapResponse;

/**
 * Class LinkedAccountResponse
 *
 * @package Affilinet\PublisherData\Responses
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class LinkedAccountResponse extends AbstractSoapResponse {

    /** @var Account $account */
    protected $account;

    /**
     * constructor.
     * @param object $response
     */
    public function __construct($response) {
        parent::__construct($response);

        if (!isset($this->getResponse()->LinkedAccountCollection)) {
            $this->account = null;

            return;
        }

        $this->account = new Account($this->getResponse()->LinkedAccountCollection);
    }

    /**
     * @return Account|null
     */
    public function getAccount() {
        return $this->account;
    }

}
