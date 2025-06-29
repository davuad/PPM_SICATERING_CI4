<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberTokenModel extends Model
{
    protected $table            = 'member_token';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['member_id', 'auth_key'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
