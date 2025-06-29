<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model {
  protected $table = 'member';
  protected $primaryKey = 'id';
  protected $allowedFields = ['username', 'email', 'password', 'nama_lengkap', 'created_at', 'updated_at'];

  // Menambahkan auto timestamp
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
}
