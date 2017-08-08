<?php

namespace Affilinet\PublisherData\Responses\ResponseElements\Stubs;


/**
 * Class BannerStub
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class BannerStub {

    /** @var  string */
    private $fileFormat;

    /** @var  string */
    private $altTag;

    /** @var  string */
    private $bannerUrl;

    /** @var  int */
    private $height;

    /** @var  int */
    private $width;

    /**
     * BannerStub constructor.
     * @param object $rawBannerStub
     */
    public function __construct($rawBannerStub) {
        $this->fileFormat = $rawBannerStub->FileFormat;
        $this->altTag = $rawBannerStub->AltTag;
        $this->bannerUrl = $rawBannerStub->BannerURL;
        $this->height = $rawBannerStub->Height;
        $this->width = $rawBannerStub->Width;
    }

    /**
     * @return string
     */
    public function getFileFormat() {
        return $this->fileFormat;
    }

    /**
     * @return string
     */
    public function getAltTag() {
        return $this->altTag;
    }

    /**
     * @return string
     */
    public function getBannerUrl() {
        return $this->bannerUrl;
    }

    /**
     * @return int
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getWidth() {
        return $this->width;
    }


}