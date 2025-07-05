<?php

namespace App\Controllers;

use App\Models\MinumanModel;  // Menggunakan model MinumanModel

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

        $model = new MinumanModel();
        $model->insert($data);

        $produk = $model->find($model->getInsertID());

        if ($produk) {
            $produk = $this->formatMinuman($produk);
        }

        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk menampilkan semua data minuman
    public function list()
    {
        $model = new MinumanModel();
        $produk = $model->findAll();

        $produk = array_map(function ($row) {
            return $this->formatMinuman($row);
        }, $produk);

        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk menampilkan detail minuman berdasarkan ID
    public function detail($id)
    {
        $model = new MinumanModel();
        $produk = $model->find($id);

        if ($produk) {
            $produk = $this->formatMinuman($produk);
        }

        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk mengubah data minuman berdasarkan ID
    public function ubah($id)
    {
        $input = $this->request->getRawInput();

        // Ambil data dari request
        $data = [
            'kode_minuman' => $input['kode_minuman'] ?? '',
            'nama_minuman' => $input['nama_minuman'] ?? '',
            'harga' => $input['harga'] ?? ''
        ];

        $model = new MinumanModel();
        $model->update($id, $data);
        $produk = $model->find($id);

        return $this->responseHasil(200, true, $produk);
    }

    // Method untuk menghapus data minuman berdasarkan ID
    public function hapus($id)
    {
        $model = new MinumanModel();
        $produk = $model->delete($id);

        return $this->responseHasil(200, true, $produk);
    }

    // Helper untuk casting data minuman agar id dan harga sesuai tipe di frontend
    private function formatMinuman($row)
    {
        return [
            'id' => (int) $row['id'],
            'kode_minuman' => $row['kode_minuman'],
            'nama_minuman' => $row['nama_minuman'],
            'harga' => (float) $row['harga'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ];
    }
}
