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
        $model = new PetugasModel();  // Menggunakan model PetugasModel
        $petugas = $model->findAll();
        return $this->responseHasil(200, true, $petugas);
    }

    // Method untuk menampilkan detail petugas berdasarkan ID
    public function detail($id)
    {
        $model = new PetugasModel();  // Menggunakan model PetugasModel
        $petugas = $model->find($id);

        return $this->responseHasil(200, true, $petugas);
    }

    // Method untuk mengubah data petugas berdasarkan ID
    public function ubah($id)
    {
        $model = new PetugasModel();  // Menggunakan model PetugasModel
        $data = [
            'nama_petugas' => $this->request->getVar('nama_petugas'),
            'jabatan' => $this->request->getVar('jabatan'),
            'no_hape' => $this->request->getVar('no_hape')
        ];

        $model->update($id, $data);
        $petugas = $model->find($id);

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
