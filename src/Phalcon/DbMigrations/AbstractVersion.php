<?php

namespace Phalcon\DbMigrations;

use \Phalcon\Db\Adapter\Pdo as Adapter;

/**
 * Class AbstractVersion
 * @package Phalcon\Migrations
 */
abstract class AbstractVersion
{
    /**
     * @var Adapter
     */
    protected $connection;

    /**
     * @param Adapter $connection
     *
     * @return $this
     */
    protected function setConnection(Adapter $connection)
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * Executes a SQL Statement
     *
     * @param string $sql
     */
    public function execute($sql)
    {
        $this->connection->query($sql)->execute();
    }

    abstract public function up();
    abstract public function down();
}
