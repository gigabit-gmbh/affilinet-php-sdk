<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;


/**
 * Class Program
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class Program {

    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var string */
    private $partnerShipStatus;

    /** @var string */
    private $classifciation;

    /** @var string */
    private $limitationsComment;

    /** @var \DateTime */
    private $launchDate;

    /** @var string */
    private $programUrl;

    /** @var string */
    private $logoUrl;

    /** @var string */
    private $trackingMethod;

    /** @var int */
    private $cookieLifetime;

    /** @var array<int> */
    private $categoryIds;

    /** @var string */
    private $semPolicy;

    /** @var string */
    private $status;

    /** @var array<CommissionTypeDetail> */
    private $commission;

    /** @var string */
    private $screenshotUrl;

    /**
     * Program constructor.
     * @param object $rawProgram
     */
    public function __construct($rawProgram) {
        $this->id = $rawProgram->ProgramId;
        $this->title = $rawProgram->ProgramTitle;
        $this->description = $rawProgram->ProgramDescription;
        $this->partnerShipStatus = $rawProgram->PartnershipStatus;
        $this->classifciation = $rawProgram->ProgramClassificationEnum;
        $this->limitationsComment = $rawProgram->LimitationsComment;
        $this->launchDate = $rawProgram->LaunchDate;
        $this->programUrl = $rawProgram->ProgramURL;
        $this->logoUrl = $rawProgram->LogoURL;
        $this->trackingMethod = $rawProgram->TrackingMethod;
        $this->cookieLifetime = $rawProgram->CookieLifetime;
        $this->categoryIds = $rawProgram->ProgramCategoryIds->int;
        $this->semPolicy = $rawProgram->SEMPolicyEnum;
        $this->status = $rawProgram->ProgramStatusEnum;
        $this->commission = $this->setCommissionTypes($rawProgram->CommissionTypes);
        $this->screenshotUrl = $rawProgram->ScreenshotURL;
    }

    /**
     * @param array <string> $commissionTypes
     * @return array
     */
    protected function setCommissionTypes($commissionTypes) {
        $commission = array();
        $typeDetail = $commissionTypes->CommissionTypeDetail;
        if(is_array($typeDetail)){
            foreach ($typeDetail as $commissionType) {
                $commission[] = new CommissionTypeDetail($commissionType);
            }
        }else{
            $commission[] = new CommissionTypeDetail($typeDetail);
        }

        return $commission;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPartnerShipStatus() {
        return $this->partnerShipStatus;
    }

    /**
     * @return string
     */
    public function getClassifciation() {
        return $this->classifciation;
    }

    /**
     * @return string
     */
    public function getLimitationsComment() {
        return $this->limitationsComment;
    }

    /**
     * @return \DateTime
     */
    public function getLaunchDate() {
        return $this->launchDate;
    }

    /**
     * @return string
     */
    public function getProgramUrl() {
        return $this->programUrl;
    }

    /**
     * @return string
     */
    public function getLogoUrl() {
        return $this->logoUrl;
    }

    /**
     * @return string
     */
    public function getTrackingMethod() {
        return $this->trackingMethod;
    }

    /**
     * @return int
     */
    public function getCookieLifetime() {
        return $this->cookieLifetime;
    }

    /**
     * @return array
     */
    public function getCategoryIds() {
        return $this->categoryIds;
    }

    /**
     * @return string
     */
    public function getSemPolicy() {
        return $this->semPolicy;
    }

    /**
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @return array<CommissionTypeDetail>
     */
    public function getCommission() {
        return $this->commission;
    }

    /**
     * @return string
     */
    public function getScreenshotUrl() {
        return $this->screenshotUrl;
    }


}