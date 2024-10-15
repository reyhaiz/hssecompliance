<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'idadmin';
    protected $allowedFields = [
        'nama_admin', 'email_admin', 'password_admin', 'role', 'foto_profil'
    ];
}
