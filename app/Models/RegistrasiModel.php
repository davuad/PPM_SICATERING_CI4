<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiModel extends Model
{
  protected $table = 'member';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['nama', 'email', 'password'];
}
