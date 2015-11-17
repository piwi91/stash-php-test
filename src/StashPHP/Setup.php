<?php

namespace StashPHP;

use Stash\Driver\Memcache;
use Stash\Pool;

final class Setup
{
    /**
     * @var Pool
     */
    private $pool;

    public function __construct()
    {
        $this->pool = new Pool(new Memcache([['127.0.0.1', '11211']]));
        $this->pool->setNamespace('hotflo20dev');
    }

    /**
     * @return Pool
     */
    public function getPool()
    {
        return $this->pool;
    }
}
