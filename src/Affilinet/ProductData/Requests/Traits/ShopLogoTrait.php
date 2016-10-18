<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\ProductData\Requests\Traits;

trait ShopLogoTrait
{

    /**
     * @return $this
     */
    public function addAllShopLogos()
    {
        $this->addShopLogoWithSize50px()
            ->addShopLogoWithSize90px()
            ->addShopLogoWithSize150px()
            ->addShopLogoWithSize468px();

        return $this;
    }

    /**
     * @return $this
     */
    public function addShopLogoWithSize50px()
    {
        $this->addLogoScale('Logo50');

        return $this;
    }

    /**
     * @param $scale
     * @return $this
     */
    private function addLogoScale($scale)
    {
        if (!isset(
            $this->queryParams['LogoScale']
        )
        ) {
            $scales = [];
        } else {
            $scales = explode(',', $this->queryParams['LogoScale']);
        }
        if (!in_array($scale, $scales)) {
            $scales[] = $scale;
        }

        $this->queryParams['LogoScale'] = implode(',', $scales);

        return $this;
    }

    /**
     * @return $this
     */
    public function addShopLogoWithSize90px()
    {
        $this->addLogoScale('Logo90');

        return $this;
    }

    /**
     * @return $this
     */
    public function addShopLogoWithSize120px()
    {
        $this->addLogoScale('Logo120');

        return $this;
    }

    /**
     * @return $this
     */
    public function addShopLogoWithSize150px()
    {
        $this->addLogoScale('Logo150');

        return $this;
    }

    /**
     * @return $this
     */
    public function addShopLogoWithSize468px()
    {
        $this->addLogoScale('Logo468');

        return $this;
    }
}
