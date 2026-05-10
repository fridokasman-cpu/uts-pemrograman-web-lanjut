<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        return view('mahasiswa_view');
    }

    public function getData()
    {
        $model = new MahasiswaModel();
        return $this->response->setJSON($model->findAll());
    }

    public function simpan()
    {
        $model = new MahasiswaModel();

        $model->save([
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama')
        ]);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function hapus($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);

        return $this->response->setJSON(['status' => 'deleted']);
    }
}