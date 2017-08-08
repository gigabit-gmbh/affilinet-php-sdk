<?php

namespace Affilinet\PublisherData\Requests;

use Affilinet\Exceptions\AffilinetProductWebserviceException;
use Affilinet\PublisherData\AffilinetPublisherClient;
use Affilinet\PublisherData\Responses\LinkedAccountResponse;
use Affilinet\PublisherData\Responses\PaymentResponse;
use Affilinet\Requests\AbstractSoapRequest;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class AccountRequest
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class AccountRequest extends AbstractSoapRequest {

    /**
     * @var $affilinetClient AffilinetPublisherClient
     */
    protected $affilinetClient;

    /**
     * CategoriesRequest constructor.
     * @param AffilinetPublisherClient $affilinetClient
     */
    public function __construct(AffilinetPublisherClient $affilinetClient) {
        parent::init($affilinetClient);
        $this->setToken($this->affilinetClient->getAffilinetToken($this->getToken()));
    }

    /**
     * @return string
     */
    public function getEndpoint() {
        return 'https://api.affili.net/V2.0/AccountService.svc?wsdl';
    }


    /**
     *
     * @return LinkedAccountResponse
     */
    public function getLinkedAccounts() {
        $accounts = $this->send("GetLinkedAccounts", array('PublisherId' => $this->affilinetClient->getPublisherId()));

        return new LinkedAccountResponse($accounts);
    }

    /**
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     *
     * @return PaymentResponse
     */
    public function getPayments($startDate, $endDate) {
        $accounts = $this->send("GetPayments", array(
            'PublisherId' => $this->affilinetClient->getPublisherId(),
            'EndDate' => $endDate->getTimestamp(),
            'StartDate' => $startDate->getTimestamp(),
        ));

        return new PaymentResponse($accounts);
    }

    // TODO: PubliserhSummary

}
