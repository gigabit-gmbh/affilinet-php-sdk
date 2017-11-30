<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;


/**
 * Class ProgramRate
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class ProgramRate {

    /** @var  int */
    private $linkNumber;

    /** @var  string */
    private $linkType;

    /** @var  int */
    private $programId;

    /** @var  string */
    private $rateMode;

    /** @var  string */
    private $rateName;

    /** @var  int */
    private $rateNumber;

    /** @var  double */
    private $rateValue;

    /** @var  string */
    private $unit;

    /**
     * ProgramRate constructor.
     * @param object $rate
     */
    public function __construct($rate) {
        $this->linkNumber = $rate->LinkNumber;
        $this->linkType = $rate->LinkType;
        $this->programId = $rate->ProgramId;
        $this->rateMode = $rate->RateMode;
        $this->rateName = $rate->RateName;
        $this->rateNumber = $rate->RateNumber;
        $this->rateValue = $rate->RateValue;
        $this->unit = $rate->Unit;
    }


}