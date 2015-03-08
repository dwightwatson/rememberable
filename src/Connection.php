<?php
namespace Watson\Rememberable;

class Connection extends \Illuminate\Database\Connection
{
    /**
     * Begin a fluent query against a database table.
     *
     * @param  string  $table
     * @return \Watson\Rememberable\Query\Builder
     */
    public function table($table)
    {
        $processor = $this->getPostProcessor();

        $query = new Query\Builder($this, $this->getQueryGrammar(), $processor);

        return $query->from($table);
    }
}
