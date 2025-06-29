<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model {
  protected $table = 'member'; // Ganti dengan nama tabel yang sesuai
  protected $primaryKey = 'id';
  protected $allowedFields = ['id', 'auth_key'];
  // Menambahkan auto timestamp
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
}
