<?php

namespace App\Controllers;

use App\Models\MinumanModel;  // Mengubah model menjadi MinumanModel

class MinumanController extends RestfulController
{
    // Method untuk membuat data minuman baru
    public function create()
    {
        $data = [
            'kode_minuman' => $this->request->getVar('kode_minuman'),
            'nama_minuman' => $this->request->getVar('nama_minuman'),
            'harga' => $this->request->getVar('harga')
        ];
        $model = new MinumanModel();  // Menggunakan model MinumanModel
        $model->insert($data);
        $produk = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk menampilkan semua data minuman
    public function list()
    {
        $model = new MinumanModel();  // Menggunakan model MinumanModel
        $produk = $model->findAll();
        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk menampilkan detail minuman berdasarkan ID
    public function detail($id)
    {
        $model = new MinumanModel();  // Menggunakan model MinumanModel
        $produk = $model->find($id);

        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk mengubah data minuman berdasarkan ID
    public function ubah($id)
    {
        $model = new MinumanModel();  // Menggunakan model MinumanModel
        $data = [
            'kode_minuman' => $this->request->getVar('kode_minuman'),
            'nama_minuman' => $this->request->getVar('nama_minuman'),
            'harga' => $this->request->getVar('harga')
        ];

        $model->update($id, $data);
        $produk = $model->find($id);

        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk menghapus data minuman berdasarkan ID
    public function hapus($id)
    {
        $model = new MinumanModel();  // Menggunakan model MinumanModel
        $produk = $model->delete($id);

        return $this->responseHasil(200, true, $produk);
    }
}
