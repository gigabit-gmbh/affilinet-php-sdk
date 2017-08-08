<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;

/**
 * Class ComissionType
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class CommissionTypeDetail {

    /** @var  string */
    private $commissionType;

    /** @var  float */
    private $volumeMin;

    /** @var  float */
    private $volumeMax;

    /** @var string */
    private $unit;

    /**
     * CommissionTypeDetail constructor.
     *
     * @param object $rawCommissionTypeDetail
     */
    public function __construct($rawCommissionTypeDetail) {
        if (isset($rawCommissionTypeDetail->CommissionTypeEnum)) {
            $this->commissionType = $rawCommissionTypeDetail->CommissionTypeEnum;
        }
        $this->volumeMin = $rawCommissionTypeDetail->VolumeMin;
        $this->volumeMax = $rawCommissionTypeDetail->VolumeMax;
        $this->unit = $rawCommissionTypeDetail->Unit;
    }

    /**
     * @return string
     */
    public function getCommissionType() {
        return $this->commissionType;
    }

    /**
     * @return float
     */
    public function getVolumeMin() {
        return $this->volumeMin;
    }

    /**
     * @return float
     */
    public function getVolumeMax() {
        return $this->volumeMax;
    }

    /**
     * @return string
     */
    public function getUnit() {
        return $this->unit;
    }


}