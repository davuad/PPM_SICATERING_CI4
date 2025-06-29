<?php

namespace App\Controllers;
use App\Models\MemberModel;
use App\Models\MemberTokenModel;
use App\Controllers\RestfulController;

class LoginController extends RestfulController {

  public function login() {
    // Ambil data dari request
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    // Validasi jika ada field yang kosong
    if (empty($email) || empty($password)) {
      return $this->responseHasil(400, false, "Email dan password wajib diisi.");
    }

    // Cek apakah email ada di database
    $memberModel = new MemberModel();
    $member = $memberModel->where('email', $email)->first();
    if (!$member) {
      return $this->responseHasil(400, false, "Email tidak terdaftar.");
    }

    // Verifikasi password
    if (!password_verify($password, $member['password'])) {
      return $this->responseHasil(400, false, "Password tidak valid.");
    }

    // Generate token (auth_key)
    $auth_key = $this->generateAuthKey();

    // Simpan token ke tabel member_token
    $memberTokenModel = new MemberTokenModel();
    // Jika ada token sebelumnya, kita hapus dulu token lama agar hanya ada satu token aktif per user
    $memberTokenModel->where('member_id', $member['id'])->delete();

    // Simpan token baru
    $memberTokenModel->save([
      'member_id' => $member['id'],
      'auth_key'  => $auth_key
    ]);

    // Kirimkan response dengan token dan data user
    $data = [
      'token' => $auth_key,
      'user' => [
        'id' => $member['id'],
        'email' => $member['email'],
        'username' => $member['username'],
        'nama_lengkap' => $member['nama_lengkap']
      ]
    ];

    return $this->responseHasil(200, true, $data);
  }

  // Fungsi untuk generate token secara acak
  private function generateAuthKey($length = 100) {
    $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $panjang_karakter = strlen($karakter);
    $str = '';
    for ($i = 0; $i < $length; $i++) {
      $str .= $karakter[rand(0, $panjang_karakter - 1)];
    }
    return $str;
  }
}
