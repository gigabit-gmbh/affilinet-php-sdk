<?php

namespace Affilinet\Requests;

use Affilinet\AffilinetClient;
use Affilinet\PublisherData\Models\AffilinetToken;
use Affilinet\Responses\ResponseInterface;

/**
 * Interface SoapRequestInterface
 */
interface SoapRequestInterface {

    /**
     * @param \Affilinet\AffilinetClient $affilinetClient
     */
    public function init(AffilinetClient $affilinetClient);

    /**
     * @return AffilinetToken
     */
    public function getToken();

    /**
     * @param AffilinetToken
     */
    public function setToken($token);

    /**
     * @return \SoapClient
     */
    public function getSoapClient();

    /**
     * @param $method string
     * @param $parameters array
     *
     * @return ResponseInterface
     */
    public function send($method, $parameters);

    /**
     * Get the URI to where this request should be sent
     *
     * @return string
     */
    public function getEndpoint();

}
