<?php

namespace Affilinet\PublisherData\Models;


/**
 * Class Token
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class AffilinetToken {

    private $token;
    private $expirationDate;

    /**
     * Token constructor.
     * @param $token
     * @param $expirationDate
     */
    public function __construct($token, $expirationDate) {
        $this->token = $token;
        $this->expirationDate = $expirationDate;
    }


    /**
     * @return mixed
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * @param mixed $token
     *
     * @return AffilinetToken
     */
    public function setToken($token) {
        $this->token = $token;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate() {
        return $this->expirationDate;
    }

    /**
     * @param mixed $expirationDate
     *
     * @return AffilinetToken
     */
    public function setExpirationDate($expirationDate) {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Checks if token is expired
     *
     * @return boolean
     */
    public function isExpired() {

        $expirationDate = $this->getExpirationDate();

        // If expiration date is not available, return true
        if (!isset($expirationDate)) {
            return true;
        }

        // Check if the token has already expired
        return date(DATE_ATOM) > $expirationDate;
    }

}