<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminActivityLogModel extends Model
{
    protected $table = 'admin_activity_log';
    protected $primaryKey = 'idlog';
    protected $allowedFields = [
        'idadmin', 'aktivitas', 'created_at', 'ip_address'
    ];
}
