<?php

namespace App\Controllers;

use App\Models\MakananModel;
use App\Models\Produk;


class MakananController extends RestfulController
{

    public function create()
    {
        $data = [
            'kode_makanan' => $this->request->getVar('kode_makanan'),
            'nama_makanan' => $this->request->getVar('nama_makanan'),
            'harga' => $this->request->getVar('harga')
        ];
        $model = new MakananModel();
        $model->insert($data);
        $produk = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $produk);
    }

    public function list()
    {
        $model = new MakananModel();
        $produk = $model->findAll();

        $produk = array_map(function ($row) {
            return [
                'id' => (int) $row['id'],
                'kode_makanan' => $row['kode_makanan'],
                'nama_makanan' => $row['nama_makanan'],
                'harga' => (float) $row['harga'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ];
        }, $produk);

        return $this->responseHasil(200, true, $produk);
    }

    public function detail($id)
    {
        $model = new MakananModel();
        $produk = $model->find($id);

        if ($produk) {
            $produk = [
                'id' => (int) $produk['id'],
                'kode_makanan' => $produk['kode_makanan'],
                'nama_makanan' => $produk['nama_makanan'],
                'harga' => (float) $produk['harga'],
                'created_at' => $produk['created_at'],
                'updated_at' => $produk['updated_at'],
            ];
        }

        return $this->responseHasil(200, true, $produk);
    }

    public function ubah($id)
    {
        $input = $this->request->getRawInput();
          // Ambil data dari request
        $data = [
            'kode_makanan' => $input['kode_makanan'] ?? '',
            'nama_makanan' => $input['nama_makanan'] ?? '',
            'harga' => $input['harga'] ?? ''
        ];

        $model = new MakananModel();
        $model->update($id, $data);
        $produk = $model->find($id);

        return $this->responseHasil(200, true, $produk);
    }


    public function hapus($id)
    {
        $model = new MakananModel();
        $produk = $model->delete($id);

        return $this->responseHasil(200, true, $produk);
    }
}
