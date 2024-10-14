<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminActivityLogModel extends Model
{
    protected $table = 'admin_activity_log';
    protected $primaryKey = 'id_log';
    protected $allowedFields = ['idadmin', 'aktivitas', 'idregulasi', 'created_at', 'ip_address'];
}