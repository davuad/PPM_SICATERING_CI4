<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model {
  protected $table = 'makanan';
  protected $primaryKey = 'id';
  protected $allowedFields = ['kode_makanan','nama_makanan', 'harga'];

  // Menambahkan auto timestamp
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
}
