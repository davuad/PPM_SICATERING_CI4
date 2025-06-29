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
        return $this->responseHasil(200, true, $produk);
    }

    public function detail($id)
    {
        $model = new MakananModel();
        $produk = $model->find($id);

        return $this->responseHasil(200, true, $produk);
    }

    public function ubah($id)
    {
        $model = new MakananModel();
        $data = [
            'kode_makanan' => $this->request->getVar('kode_makanan'),
            'nama_makanan' => $this->request->getVar('nama_makanan'),
            'harga' => $this->request->getVar('harga')
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
