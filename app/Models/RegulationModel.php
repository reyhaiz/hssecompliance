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
        $cursor = $this->collection->find();
        $regulations = [];

        foreach ($cursor as $regulation) {
            if (isset($regulation->fungsi_terkait) && $regulation->fungsi_terkait instanceof \MongoDB\Model\BSONArray) {
                $regulation->fungsi_terkait = $regulation->fungsi_terkait->getArrayCopy();
            }
            $regulations[] = $regulation;
        }

        return $regulations;
    }

    public function getRegulationById($id)
    {
        $regulation = $this->collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
        if (isset($regulation->fungsi_terkait) && $regulation->fungsi_terkait instanceof \MongoDB\Model\BSONArray) {
            $regulation->fungsi_terkait = $regulation->fungsi_terkait->getArrayCopy();
        }
        return $regulation;
    }

    public function createRegulation($data)
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
}
