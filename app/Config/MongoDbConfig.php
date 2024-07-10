<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MongoDbConfig extends BaseConfig
{
    public $host = 'localhost';
    public $port = 27017;
    public $database = 'hssecompliance';
    public $options = [];

    public function __construct()
    {
        $this->options = [];
    }
}
