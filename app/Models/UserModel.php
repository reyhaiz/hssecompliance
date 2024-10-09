<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'idadmin';
    protected $allowedFields = ['nama', 'email', 'kata_sandi', 'role', 'foto_profil'];
}
