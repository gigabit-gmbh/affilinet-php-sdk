<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\PublisherData\Requests;

use Affilinet\ProductData\Responses\CategoriesResponseInterface;
use Affilinet\Requests\RequestInterface;

/**
 *  Get the account of a publisher
 */
interface AccountRequestInterface extends RequestInterface
{
    /**
     * @return AccountRequestInterface
     */
    public function send();

}
