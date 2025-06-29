<?php

namespace App\Controllers;
use App\Models\MemberModel;
use App\Controllers\RestfulController;

class RegisterController extends RestfulController {

    public function register() {
        // Ambil data dari request
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $nama_lengkap = $this->request->getVar('nama_lengkap');

        // Validasi jika ada field yang kosong
        if (empty($username) || empty($email) || empty($password) || empty($nama_lengkap)) {
            return $this->responseHasil(400, false, "Semua field wajib diisi.");
        }

        // Cek jika email sudah terdaftar
        $memberModel = new MemberModel();
        $existingMember = $memberModel->where('email', $email)->first();
        if ($existingMember) {
            return $this->responseHasil(400, false, 'Email sudah terdaftar.');
        }

        // Enkripsi password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Data untuk disimpan
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
            'nama_lengkap' => $nama_lengkap,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Simpan data ke database
        if ($memberModel->save($data)) {
            return $this->responseHasil(200, true, 'Registrasi berhasil!');
        }

        return $this->responseHasil(500, false, 'Terjadi kesalahan saat menyimpan data.');
    }
}
