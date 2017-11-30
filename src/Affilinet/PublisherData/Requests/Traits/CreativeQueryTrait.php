<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\PublisherData\Requests\Traits;


trait CreativeQueryTrait {

    /**
     * @param array $categoryIds
     * @return $this
     */
    public function setCategoryIds(array $categoryIds) {
        $this->searchCreativeQuery['CategoryIds'] = $categoryIds;

        return $this;
    }

    /**
     * @param array <string> $types
     * @return $this
     */
    public function setCreativeTypes(array $types) {
        $this->searchCreativeQuery['CreativeTypes'] = $types;

        return $this;
    }

    /**
     * @param array <string> $types
     * @return $this
     */
    public function setHtmlLinkTypes(array $types) {
        $this->searchCreativeQuery['HTMLLinkTypes'] = $types;

        return $this;
    }

    /**
     * @param array <string> $types
     * @return $this
     */
    public function setTextLinkTypes(array $types) {
        $this->searchCreativeQuery['TextLinkTypes'] = $types;

        return $this;
    }

    /**
     * @param int $maxHeight
     * @return $this
     */
    public function setMaxHeight($maxHeight) {
        if (!is_numeric($maxHeight)) {
            throw new \InvalidArgumentException('Max Height is not valid. The maxHeight has to be an integer.');
        }

        $this->searchCreativeQuery['MaxHeight'] = $maxHeight;

        return $this;
    }

    /**
     * @param int $minHeight
     * @return $this
     */
    public function setMinHeight($minHeight) {
        if (!is_numeric($minHeight)) {
            throw new \InvalidArgumentException('Min Height is not valid. The minHeight has to be an integer.');
        }

        $this->searchCreativeQuery['MinHeight'] = $minHeight;

        return $this;
    }

    /**
     * @param int $maxWidth
     * @return $this
     */
    public function setMaxWidth($maxWidth) {
        if (!is_numeric($maxWidth)) {
            throw new \InvalidArgumentException('Max Width is not valid. The maxWidth has to be an integer.');
        }

        $this->searchCreativeQuery['MaxWidth'] = $maxWidth;

        return $this;
    }

    /**
     * @param int $minWidth
     * @return $this
     */
    public function setMinWidth($minWidth) {
        if (!is_numeric($minWidth)) {
            throw new \InvalidArgumentException('Min Width is not valid. The minWidth has to be an integer.');
        }

        $this->searchCreativeQuery['MinWidth'] = $minWidth;

        return $this;
    }

    /**
     * @param array<int> $programIds
     * @return $this
     */
    public function setProgramIds(array $programIds) {

        $this->searchCreativeQuery['ProgramIds'] = $programIds;

        return $this;
    }

    /**
     * @param string $searchString
     * @return $this
     */
    public function setSearchString($searchString) {

        $this->searchCreativeQuery['SearchString'] = $searchString;

        return $this;
    }


}
