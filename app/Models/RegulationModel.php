<?php

namespace App\Models;

use MongoDB\Client;

class RegulationModel
{
    protected $collection;

    public function __construct()
    {
        $config = new \Config\MongoDbConfig();
        $client = new Client("mongodb://{$config->host}:{$config->port}");
        $this->collection = $client->{$config->database}->regulations;
    }

    public function getAllRegulations()
    {
        $regulations = $this->collection->find()->toArray();

        // Capitalize first letter of 'jenis_peraturan' and 'kepatuhan'
        foreach ($regulations as &$regulation) {
            $regulation['jenis_peraturan'] = ucfirst($regulation['jenis_peraturan']);
            $regulation['kepatuhan'] = ucfirst($regulation['kepatuhan']);
        }

        return $regulations;
    }

    public function getRegulationById($id)
    {
        $regulation = $this->collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
        if ($regulation) {
            $regulation['jenis_peraturan'] = ucfirst($regulation['jenis_peraturan']);
            $regulation['kepatuhan'] = ucfirst($regulation['kepatuhan']);
        }
        return $regulation;
    }

    public function insertRegulation($data)
    {
        return $this->collection->insertOne($data);
    }

    public function updateRegulation($id, $data)
    {
        return $this->collection->updateOne(['_id' => new \MongoDB\BSON\ObjectId($id)], ['$set' => $data]);
    }

    public function deleteRegulation($id)
    {
        return $this->collection->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    }

    public function testConnection()
    {
        try {
            $config = new \Config\MongoDbConfig();
            $client = new Client("mongodb://{$config->host}:{$config->port}");
            $dbs = $client->listDatabases();
            return $dbs;
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }
}
