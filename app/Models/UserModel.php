<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin';  // Nama tabel di database
    protected $primaryKey = 'idadmin';  // Primary key dari tabel

    // Pastikan nama kolom di database sesuai dengan 'allowedFields' di bawah ini
    protected $allowedFields = ['nama_admin', 'email_admin', 'password_admin', 'role', 'foto_profil'];
    protected $useTimestamps = false;
}
