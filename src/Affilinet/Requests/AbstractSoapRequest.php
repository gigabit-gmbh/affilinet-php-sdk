<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\Requests;

use Affilinet\AffilinetClient;
use Affilinet\PublisherData\Models\AffilinetToken;

/**
 * Base Token Request Class
 */
abstract class AbstractSoapRequest implements SoapRequestInterface {

    /**
     * @var $affilinetClient AffilinetClient
     */
    protected $affilinetClient;

    /**
     * @var AffilinetToken
     */
    protected $affilinetToken;

    /**
     * @param \Affilinet\AffilinetClient $affilinetClient
     */
    public function init(AffilinetClient $affilinetClient) {
        $this->affilinetClient = $affilinetClient;
    }

    /**
     * @param string $method The SOAP method that should be called
     * @param array $parameters The parameters to send - token will be set by self
     * @return mixed
     */
    public function send($method, $parameters) {
        $parameters["CredentialToken"] = $this->getToken()->getToken();

        return $this->getSoapClient()->$method($parameters);
    }

    /**
     * @return \SoapClient
     */
    public function getSoapClient() {

        return new \SoapClient($this->getEndpoint());
    }

    /**
     * @return AffilinetToken
     */
    public function getToken() {
        return $this->affilinetToken;
    }

    /**
     * @param AffilinetToken $affilinetToken
     */
    public function setToken($affilinetToken) {
        $this->affilinetToken = $affilinetToken;
    }

}
