<?php

namespace App\Models;

use CodeIgniter\Model;
use MongoDB\Client;

class RegulationModel extends Model
{
    protected $collection = 'regulations';

    public function __construct()
    {
        $this->client = new Client('mongodb://localhost:27017'); // Pastikan URI ini benar
        $this->db = $this->client->hssecompliance1; // Pastikan nama database ini benar
    }

    public function getAllRegulations()
    {
        $regulations = $this->db->{$this->collection}->find()->toArray();
        return $regulations;
    }

    public function getRegulationById($id)
    {
        return $this->db->{$this->collection}->findOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    }

    public function createRegulation($data)
    {
        return $this->db->{$this->collection}->insertOne($data);
    }

    public function updateRegulation($id, $data)
    {
        return $this->db->{$this->collection}->updateOne(['_id' => new \MongoDB\BSON\ObjectId($id)], ['$set' => $data]);
    }

    public function deleteRegulation($id)
    {
        return $this->db->{$this->collection}->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    }
}
