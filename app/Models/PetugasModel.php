<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model {
  protected $table = 'petugas';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama_petugas','jabatan', 'no_hape'];

  // Menambahkan auto timestamp
  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
}
