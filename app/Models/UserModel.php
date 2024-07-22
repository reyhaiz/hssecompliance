<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin';
    protected $allowedFields = ['nama', 'email', 'kata_sandi', 'foto_profil', 'peran'];
}
