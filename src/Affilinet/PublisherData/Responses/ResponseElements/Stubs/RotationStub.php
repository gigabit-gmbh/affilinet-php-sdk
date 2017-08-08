<?php

namespace Affilinet\PublisherData\Responses\ResponseElements\Stubs;

/**
 * Class RotationStub
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class RotationStub {

    /** @var  int */
    private $height;

    /** @var  int */
    private $width;

    /**
     * RotationStub constructor.
     * @param object $rawRotationStub
     */
    public function __construct($rawRotationStub) {
        $this->height = $rawRotationStub->Height;
        $this->width = $rawRotationStub->Width;
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