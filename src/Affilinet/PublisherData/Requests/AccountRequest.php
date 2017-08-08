<?php

namespace Affilinet\PublisherData\Requests;

use Affilinet\Exceptions\AffilinetProductWebserviceException;
use Affilinet\PublisherData\AffilinetPublisherClient;
use Affilinet\Requests\AbstractRequest;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class AccountRequest
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class AccountRequest extends AbstractRequest implements AccountRequestInterface
{

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return 'https://api.affili.net/V2.0/AccountService.svc?wsdl';
    }

    /**
     * CategoriesRequest constructor.
     * @param AffilinetPublisherClient $affilinetClient
     */
    public function __construct(AffilinetPublisherClient $affilinetClient)
    {
        parent::__construct($affilinetClient);
        $this->queryParams['ShopId'] = 0;
    }

    /**
     * @return CategoriesResponseInterface
     * @throws AffilinetProductWebserviceException
     */
    public function send()
    {
        $psr7Request = $this->getPsr7Request();
        $psr7Response = $this->getAffilinetClient()->getHttpClient()->send($psr7Request);
        $response = new CategoriesResponse($psr7Response);

        return $response;

    }

    /**
     * @param  integer $shopId
     * @return $this;
     */
    public function setShopId($shopId = 0)
    {
        if (!is_integer($shopId) && $shopId !== 0) {
            throw new InvalidArgumentException('$shopId must be an integer value or 0');
        }
        $this->queryParams['ShopId'] = $shopId;

        return $this;
    }

    /**
     * @return $this
     */
    public function getAffilinetCategories()
    {
        $this->queryParams['ShopId'] = 0;

        return $this;
    }

}
