<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\PublisherData;

use Affilinet\AffilinetClient;
use Affilinet\PublisherData\Models\AffilinetToken;

/**
 * Client to send requests to the API
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class AffilinetPublisherClient extends AffilinetClient {

    private $wsdl = "https://api.affili.net/V2.0/Logon.svc?wsdl";

    /** @var \SoapClient */
    private $soapClient;

    public function __construct(array $config = []) {
        parent::__construct($config);

        $this->soapClient = new \SoapClient($this->wsdl);
    }

    /**
     * Get authentication token
     *
     * @param $token AffilinetToken
     *
     * @return AffilinetToken
     */
    public function getAffilinetToken($token) {
        // If there is no token stored or the token has already expired a new token is requested
        if ($token === null || ($token !== null && $token->isExpired())) {
            // Get new token and get store token expiration date
            $token = $this->createToken();
        }

        // Return token
        return $token;
    }

    /**
     * @param $token AffilinetToken
     *
     * @return string
     */
    public function getTokenString($token){
        return$this->getAffilinetToken($token)->getToken();
    }

    /**
     * Create a new authentication token
     *
     * @return AffilinetToken
     */
    private function createToken() {

        $tokenString = $this->soapClient->Logon(array(
            'Username' => $this->getPublisherId(),
            'Password' => $this->getWebservicePassword(),
            'WebServiceType' => 'Publisher',
        ));

        return new AffilinetToken($tokenString, $this->getTokenExpirationDate($tokenString));

    }

    /**
     * Get token expiration date
     *
     * @return string
     */
    private function getTokenExpirationDate($tokenString) {
        // Send a request to the Affilinet Logon Service to get the token expiration date
        return $this->soapClient->GetIdentifierExpiration($tokenString);
    }

}
