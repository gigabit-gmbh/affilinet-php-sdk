<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\ProductData\Requests\Helper;

interface QueryInterface
{

    /**
     * @return string
     */
    public function getQuery();

    /**
     * @param  QueryInterface $queryBuilder
     * @return QueryInterface
     */
    public function where(QueryInterface $queryBuilder);

    /**
     * @param  QueryInterface $queryBuilder
     * @return QueryInterface
     */
    public function andWhere(QueryInterface $queryBuilder);

    /**
     * @param  QueryInterface $queryBuilder
     * @return QueryInterface
     */
    public function orWhere(QueryInterface $queryBuilder);

    /**
     * @param $keyword string
     * @return QueryInterface
     */
    public function exactly($keyword);

    /**
     * @param array ...$keywords
     * @return mixed
     */
    public function containsOneOf(...$keywords);

    /**
     *
     * @param  string         $keyword
     * @return QueryInterface
     */
    public function contains($keyword);

    /**
     * @param  array          $keywords
     * @return QueryInterface
     */
    public function containsAllOf(...$keywords);

    /**
     * @param  array          $keywords
     * @return QueryInterface
     */
    public function containsNot(...$keywords);

}
