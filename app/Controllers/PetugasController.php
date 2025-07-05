<?php

namespace App\Controllers;

use App\Models\PetugasModel;  // Menggunakan model PetugasModel

class PetugasController extends RestfulController
{
    // Method untuk membuat data petugas baru
    public function create()
    {
        $data = [
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'jabatan' => $this->request->getVar('jabatan'),
            'no_hape' => $this->request->getVar('no_hape')
        ];
        $model = new PetugasModel();  // Menggunakan model PetugasModel
        $model->insert($data);
        $petugas = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $petugas);
    }

    // Method untuk menampilkan semua data petugas
    public function list()
    {
        $model = new PetugasModel();
        $petugas = $model->findAll();

        $petugas = array_map(function ($row) {
            return [
                'id' => (int) $row['id'],
                'nama_petugas' => $row['nama_petugas'],
                'jabatan' => $row['jabatan'],
                'no_hape' => (int) $row['no_hape'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ];
        }, $petugas);

        return $this->responseHasil(200, true, $petugas);
    }

    // Method untuk menampilkan detail petugas berdasarkan ID
    public function detail($id)
    {
        $model = new PetugasModel();  // Menggunakan model PetugasModel
        $petugas = $model->find($id); // atau getInsertID() di create()

        if ($petugas) {
            $petugas = [
                'id' => (int) $petugas['id'],
                'nama_petugas' => $petugas['nama_petugas'],
                'jabatan' => $petugas['jabatan'],
                'no_hape' => (int) $petugas['no_hape'],
                'created_at' => $petugas['created_at'],
                'updated_at' => $petugas['updated_at'],
            ];
        }

        return $this->responseHasil(200, true, $petugas);
    }

    // Method untuk mengubah data petugas berdasarkan ID
    public function ubah($id)
    {
        $model = new PetugasModel();
        $data = [
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'jabatan' => $this->request->getVar('jabatan'),
            'no_hape' => $this->request->getVar('no_hape')
        ];

        $model->update($id, $data);
        $petugas = $model->find($id);

        if ($petugas) {
            $petugas = [
                'id' => (int) $petugas['id'],
                'nama_petugas' => $petugas['nama_petugas'],
                'jabatan' => $petugas['jabatan'],
                'no_hape' => $petugas['no_hape'],
                'created_at' => $petugas['created_at'],
                'updated_at' => $petugas['updated_at'],
            ];
        }

        return $this->responseHasil(200, true, $petugas);
    }

    // Method untuk menghapus data petugas berdasarkan ID
    public function hapus($id)
    {
        $model = new PetugasModel();  // Menggunakan model PetugasModel
        $petugas = $model->delete($id);

        return $this->responseHasil(200, true, $petugas);
    }
}
