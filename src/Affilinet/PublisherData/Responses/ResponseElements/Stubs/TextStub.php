<?php

namespace Affilinet\PublisherData\Responses\ResponseElements\Stubs;


/**
 * Class TextStub
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class TextStub {

    /** @var string */
    private $header;

    /** @var string */
    private $content;

    /** @var string */
    private $footer;

    /** @var bool */
    private $headerLinked;

    /** @var bool */
    private $contentLinked;

    /** @var bool */
    private $footerLinked;

    /** @var bool */
    private $dynamic;

    /** @var string */
    private $textLinkType;

    /**
     * TextStub constructor.
     * @param $rawTextStub
     */
    public function __construct($rawTextStub) {
        $this->header = $rawTextStub->Header;
        $this->content = $rawTextStub->Content;
        $this->footer = $rawTextStub->Footer;
        $this->headerLinked = $rawTextStub->IsHeaderLinked;
        $this->contentLinked = $rawTextStub->IsContentLinked;
        $this->footerLinked = $rawTextStub->IsFooterLinked;
        $this->dynamic = $rawTextStub->IsDynamic;
        $this->textLinkType = $rawTextStub->TextLinkTypeEnum;
    }

    /**
     * @return string
     */
    public function getHeader() {
        return $this->header;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getFooter() {
        return $this->footer;
    }

    /**
     * @return bool
     */
    public function isHeaderLinked() {
        return $this->headerLinked;
    }

    /**
     * @return bool
     */
    public function isContentLinked() {
        return $this->contentLinked;
    }

    /**
     * @return bool
     */
    public function isFooterLinked() {
        return $this->footerLinked;
    }

    /**
     * @return bool
     */
    public function isDynamic() {
        return $this->dynamic;
    }

    /**
     * @return string
     */
    public function getTextLinkType() {
        return $this->textLinkType;
    }



}