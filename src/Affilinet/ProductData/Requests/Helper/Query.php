<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\ProductData\Requests\Helper;

/**
 * Class QueryBuilderTrait
 *
 * The keyword(s) you want the products to match. Can be any
 * length. The following search operators are supported:
 *      - AND (both query tokens must be contained in the product, but not necessarily next to one another)
 *      - OR (any of the query tokens must be contained in the product)
 *      - NOT (e.g. with “ipod AND NOT nano”, you will get products, which match the query “ipod”, but at the same time don’t match “nano”)
 *      - "(phrase match: all query tokens inclosed with double quotes must be contained in the found products in that order)
 *      - () Parentheses, to group expressions So you can formulate a query like this: "apple ipod" ((touch OR classic) NOT nano) AND "32  GB"
 *
 * SearchProducts supports the wildcard ‘*’ for suffix matching, that
 * is: a query ‘bott*’ will match for products, which contain the word
 * “bottle” or the word “bottom”.
 * Search operators “AND”, “OR” and “NOT” must be in capital
 * letters.
 *
 *  */
class Query implements QueryInterface
{

    private $stack = [
        0 => '',
    ];

    private $depth = 0;

    /**
     * @return string
     */
    public function getQuery()
    {
        $maxKey = max(array_keys($this->stack));

        return $this->stack[$maxKey] ;
    }

    /**
     * @param  QueryInterface $queryBuilder
     * @return QueryInterface
     */
    public function where(QueryInterface $queryBuilder)
    {
        $this->depth++;

        if (!isset($this->stack[$this->depth])) {
            $this->stack[$this->depth] = '';
        }
        if ($this->stack[$this->depth] === '') {
            $this->stack[$this->depth] = ' (' . $this->stack[$this->depth-1] . ' ) ';
        } else {
            $this->stack[$this->depth] .= ' AND (' . $this->stack[$this->depth-1] . ' ) ';
        }

        $this->stack[$this->depth-1]  = '';

        return $this;
    }

    /**
     * @param  QueryInterface $queryBuilder
     * @return QueryInterface
     */
    public function andWhere(QueryInterface $queryBuilder)
    {
        $this->depth++;

        if (!isset($this->stack[$this->depth])) {
            $this->stack[$this->depth] = '';
        }

        if ($this->stack[$this->depth] === '') {
            $this->stack[$this->depth] = ' (' . $this->stack[$this->depth-1] . ' ) ';
        } else {
            $this->stack[$this->depth] .= ' AND ( ' . $this->stack[$this->depth-1] . ' ) ';
        }

        $this->stack[$this->depth-1]  = '';

        return $this;
    }

    /**
     * @param  QueryInterface $queryBuilder
     * @return QueryInterface
     */
    public function orWhere(QueryInterface $queryBuilder)
    {

        $this->depth++;

        if (!isset($this->stack[$this->depth])) {
            $this->stack[$this->depth] = '';
        }

        if ($this->stack[$this->depth] === '') {
            $this->stack[$this->depth] = ' OR (' . $this->stack[$this->depth-1] . ' ) ';
        } else {
            $this->stack[$this->depth] .= ' OR ( ' . $this->stack[$this->depth-1] . ' ) ';
        }

        $this->stack[$this->depth-1]  = '';

        return $this;
    }

    /**
     * @param $keyword string
     * @return QueryInterface
     */
    public function exactly($keyword)
    {
        if ($this->stack[$this->depth] === '') {
            $this->stack[$this->depth] = ' "'.$keyword. '"';
        } else {
            $this->stack[$this->depth] .= ' AND "'.$keyword. '"';
        }

        return $this;
    }

    /**
     * @param array ...$keywords
     * @return QueryInterface
     */
    public function containsOneOf(...$keywords)
    {
        $this->stack[$this->depth] .= $this->combineLiterals($keywords, 'OR');

        return $this;
    }

    /**
     *
     * @param  string         $keyword
     * @return QueryInterface
     */
    public function contains($keyword)
    {
        if ($this->stack[$this->depth] === '') {
            $this->stack[$this->depth] = ' "'.$keyword. '"';
        } else {
            $this->stack[$this->depth] .= ' AND "'.$keyword. '"';
        }

        return $this;
    }

    /**
     * @param  array          $keywords
     * @return QueryInterface
     */
    public function containsAllOf(...$keywords)
    {
        $this->stack[$this->depth] .= $this->combineLiterals($keywords, 'AND');

        return $this;
    }

    /**
     * @param  array          $keywords
     * @return QueryInterface
     */
    public function containsNot(...$keywords)
    {
        $this->stack[$this->depth] .= $this->combineLiterals($keywords, 'NOT');

        return $this;
    }

    /**
     * @param $keywords
     * @param $operator
     * @return string
     */
    private function combineLiterals($keywords, $operator)
    {
        if (count($keywords) === 1) {
            switch ($operator) {
                case 'NOT': return ' NOT "'. $keywords[0].'" ' ;
            }
        }

        // do not add a leading AND
        if ($this->stack[$this->depth] === '') {
            $string = ' (';
        } else {
            $string = ' AND (';
        }

        foreach ($keywords as $keyword) {
            $string .= ' '. $operator . ' "' .$keyword. '" ' ;
        }
        $string .= ')';

        return $string;
    }
}
