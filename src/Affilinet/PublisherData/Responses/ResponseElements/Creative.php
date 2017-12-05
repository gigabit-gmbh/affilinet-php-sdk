<?php

namespace Affilinet\PublisherData\Responses\ResponseElements;

use Affilinet\PublisherData\Responses\ResponseElements\Stubs\BannerStub;
use Affilinet\PublisherData\Responses\ResponseElements\Stubs\HtmlStub;
use Affilinet\PublisherData\Responses\ResponseElements\Stubs\RotationStub;
use Affilinet\PublisherData\Responses\ResponseElements\Stubs\TextStub;

/**
 * Class Creative
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class Creative {


    /**
     * @var int $programId
     */
    private $programId;

    /**
     * @var string
     */
    private $creativeTypes;

    /**
     * @var int
     */
    private $creativeNumber;

    /**
     * @var array<int>
     */
    private $categoryIds;

    /**
     * @var string
     */
    private $integrationCode;

    /**
     * @var string
     */
    private $title;

    /**
     * @var BannerStub
     */
    private $bannerStub;

    /**
     * @var TextStub
     */
    private $textStub;

    /**
     * @var HtmlStub
     */
    private $htmlStub;

    /**
     * @var RotationStub
     */
    private $rotationStub;


    public function __construct($creative) {
        $this->programId = $creative->ProgramId;
        $this->creativeTypes = $creative->CreativeTypeEnum;
        $this->creativeNumber = $creative->CreativeNumber;
        $this->categoryIds = $creative->InCategories->int;
        $this->integrationCode = $creative->IntegrationCode;
        $this->title = $creative->Title;
        if(isset($creative->BannerStub)){
            $this->bannerStub = new BannerStub($creative->BannerStub);
        }
        if(isset($creative->TextStub)){
            $this->textStub = new TextStub($creative->TextStub);
        }
        if(isset($creative->RotationStub)){
            $this->textStub = new RotationStub($creative->RotationStub);
        }
        if(isset($creative->HTMLStub)){
            $this->textStub = new HtmlStub($creative->HTMLStub);
        }
    }

    /**
     * @return int
     */
    public function getProgramId() {
        return $this->programId;
    }

    /**
     * @return string
     */
    public function getCreativeTypes() {
        return $this->creativeTypes;
    }

    /**
     * @return int
     */
    public function getCreativeNumber() {
        return $this->creativeNumber;
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
    public function getIntegrationCode() {
        return $this->integrationCode;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return BannerStub
     */
    public function getBannerStub() {
        return $this->bannerStub;
    }

    /**
     * @return TextStub
     */
    public function getTextStub() {
        return $this->textStub;
    }

    /**
     * @return HtmlStub
     */
    public function getHtmlStub() {
        return $this->htmlStub;
    }

    /**
     * @return RotationStub
     */
    public function getRotationStub() {
        return $this->rotationStub;
    }


}
