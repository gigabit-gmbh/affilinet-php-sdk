<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\PublisherData\Requests\Traits;


trait ProgramsQueryTrait {

    /**
     * @param $partnerShipStatus array<string>
     */
    public function setPartnerShipStatus($partnerShipStatus) {
        $this->programsQuery["PartnershipStatus"] = $partnerShipStatus;
    }

    /**
     * @param $programClassification string
     */
    public function setProgramClassification($programClassification) {
        $this->programsQuery["ProgramClassificationEnum"] = $programClassification;
    }


    /**
     * @param array <int> $categoryIds
     * @return $this
     */
    public function setProgramCategoryIds(array $categoryIds) {
        $this->programsQuery['ProgramCategoryIds'] = $categoryIds;

        return $this;
    }


    /**
     * @param array <string> $trackingMethods
     * @return $this
     */
    public function setTrackingMethods(array $trackingMethods) {
        $this->programsQuery['TrackingMethods'] = $trackingMethods;

        return $this;
    }

    /**
     * @param array <string> $semPolicyTypes
     * @return $this
     */
    public function setSemPolicyTypes(array $semPolicyTypes) {
        $this->programsQuery['TrackingMethods'] = $semPolicyTypes;

        return $this;
    }

    /**
     * @param int $minimumCookieLifetime
     * @return $this
     */
    public function setMinimumCookieLifetime($minimumCookieLifetime) {
        $this->programsQuery['MinimumCookieLifetime'] = $minimumCookieLifetime;

        return $this;
    }

    /**
     * @param int $maximumProgramLifetime
     * @return $this
     */
    public function setMaximumProgramLifetime($maximumProgramLifetime) {
        $this->programsQuery['MaximumProgramLifetime'] = $maximumProgramLifetime;

        return $this;
    }

    /**
     * @param bool $autoAccept
     * @return $this
     */
    public function setAutoAccept($autoAccept) {
        $this->programsQuery['AutoAccept'] = $autoAccept;

        return $this;
    }

    /**
     * @param bool $hasProductData
     * @return $this
     */
    public function setHasProductData($hasProductData) {
        $this->programsQuery['HasProductData'] = $hasProductData;

        return $this;
    }

    /**
     * @param bool $voucherCodes
     * @return $this
     */
    public function setHasVoucherCodes($voucherCodes) {
        $this->programsQuery['HasVoucherCodes'] = $voucherCodes;

        return $this;
    }

    /**
     * @param bool $new
     * @return $this
     */
    public function setNew($new) {
        $this->programsQuery['IsNew'] = $new;

        return $this;
    }

    /**
     * @param int $productDataUpdateInterval
     * @return $this
     */
    public function setMaxHeight($productDataUpdateInterval) {
        if (!is_numeric($productDataUpdateInterval)) {
            throw new \InvalidArgumentException('ProductDataUpdateInterval is not valid. The ProductDataUpdateInterval has to be an integer.');
        }

        $this->programsQuery['ProductDataUpdateInterval'] = $productDataUpdateInterval;

        return $this;
    }


    /**
     * @param array <int> $programIds
     * @return $this
     */
    public function setProgramIds(array $programIds) {

        $this->programsQuery['ProgramIds'] = $programIds;

        return $this;
    }

    /**
     * @param string $searchString
     * @return $this
     */
    public function setSearchString($searchString) {

        $this->programsQuery['SearchString'] = $searchString;

        return $this;
    }

    /**
     * @param array <string> $commissionTypes
     * @return $this
     */
    public function setCommissionTypes($commissionTypes) {

        $this->programsQuery['CommissionTypes'] = $commissionTypes;

        return $this;
    }


}
