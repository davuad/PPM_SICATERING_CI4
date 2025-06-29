<?php

namespace App\Models;

use CodeIgniter\Model;

class MinumanModel extends Model {
  protected $table = 'minuman';
  protected $primaryKey = 'id';
  protected $allowedFields = ['kode_minuman','nama_minuman', 'harga'];

  // Menambahkan auto timestamp
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
}
