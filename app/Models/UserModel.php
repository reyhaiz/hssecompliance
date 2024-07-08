<?php

namespace App\Models;

use MongoDB\Client;

class UserModel
{
    protected $collection;

    public function __construct()
    {
        $config = new \Config\MongoDbConfig();
        $client = new Client("mongodb://{$config->host}:{$config->port}");
        $this->collection = $client->{$config->database}->users;
    }

    public function where($field, $value)
    {
        $result = $this->collection->findOne([$field => $value]);
        return $result ? (array) $result : null;
    }
}
