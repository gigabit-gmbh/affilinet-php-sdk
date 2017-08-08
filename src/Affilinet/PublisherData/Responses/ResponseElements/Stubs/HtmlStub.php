<?php

namespace Affilinet\PublisherData\Responses\ResponseElements\Stubs;


/**
 * Class HtmlStub
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class HtmlStub {

    /** @var string */
    private $htmlLinkType;

    /** @var string */
    private $htmlLinkUrl;

    /** @var int */
    private $height;

    /** @var int */
    private $width;

    /**
     * HtmlStub constructor.
     * @param object $rawHtmlStub
     */
    public function __construct($rawHtmlStub) {
        $this->htmlLinkType = $rawHtmlStub->HTMLLinkTypeEnum;
        $this->htmlLinkUrl = $rawHtmlStub->HTMLLinkURL;
        $this->height = $rawHtmlStub->Height;
        $this->width = $rawHtmlStub->Width;
    }

    /**
     * @return string
     */
    public function getHtmlLinkType() {
        return $this->htmlLinkType;
    }

    /**
     * @return string
     */
    public function getHtmlLinkUrl() {
        return $this->htmlLinkUrl;
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

