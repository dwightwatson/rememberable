<?php

namespace Watson\Rememberable;

use Watson\Rememberable\Query\Builder;

trait Rememberable
{
    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        $builder = new Builder($conn, $grammar, $conn->getPostProcessor());

        if (isset($this->rememberFor) && ! is_null($this->rememberFor)) {
            $builder->remember($this->rememberFor);
        }

        if (isset($this->rememberCacheTag) && ! is_null($this->rememberFor)) {
            $builder->cacheTags($this->rememberCacheTag);
        }

        if (isset($this->rememberCachePrefix) && ! is_null($this->rememberFor)) {
            $builder->prefix($this->rememberCachePrefix);
        }

        if (isset($this->rememberCacheDriver) && ! is_null($this->rememberFor)) {
            $builder->cacheDriver($this->rememberCacheDriver);
        }

        return $builder;
    }
}
