<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password'];

    public function where($field, $value)
    {
        return $this->where($field, $value)->first();
    }
}
