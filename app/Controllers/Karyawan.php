<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKaryawan;
use App\Models\ModelJabatan;

class Karyawan extends BaseController
{
    public function __construct()
    {
        $this->ModelKaryawan = new ModelKaryawan();
        $this->ModelJabatan = new ModelJabatan();

    }
    public function index()
    {
        $data = [
            'judul' =>'Karyawan',
            'menu' => "karyawan",
            'page'=> "backend/v_karyawan",
            'karyawan'=> $this->ModelKaryawan->allData(),
            'jabatan'=> $this->ModelJabatan->allData(),
        ];

        return view('v_template_back', $data);
    }

    public function insertData()
    {
        $foto = $this->request->getFile('foto_karyawan');
        $file_name= $foto->getRandomName();
        $data = [
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'nik' => $this->request->getPost('nik'),
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'username' => $this->request->getPost('username'),
            'password' => sha1($this->request->getPost('password')),
            'foto_karyawan' => $file_name,

        ];
        $foto->move('public/image', $file_name);
        $this->ModelKaryawan->insertData($data);
        session()->setFlashdata('pesan', "Data  berhasil ditambahakan");
        return redirect()->to('Karyawan')->withInput();
    }
    public function updateData($id_karyawan)
    {
        $foto = $this->request->getFile('foto_karyawan');
        if ($foto->getError() == 4) {
            $data = [
                'id_karyawan' => $id_karyawan,
                'id_jabatan' => $this->request->getPost('id_jabatan'),
                'nik' => $this->request->getPost('nik'),
                'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                'username' => $this->request->getPost('username'),
                'password' => sha1($this->request->getPost('password')),    
            ];
       
        }else{
            $file_name= $foto->getRandomName();
            $data = [
                'id_karyawan' => $id_karyawan,
                'id_jabatan' => $this->request->getPost('id_jabatan'),
                'nik' => $this->request->getPost('nik'),
                'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                'username' => $this->request->getPost('username'),
                'password' => sha1($this->request->getPost('password')),
                'foto_karyawan' => $file_name,
            ];
            $foto->move('public/image', $file_name);
        }

        $this->ModelKaryawan->updateData($data);

        session()->setFlashdata('pesan', "Data  berhasil diupdate");
        return redirect()->to('Karyawan')->withInput();
    }

    public function deleteData($id_karyawan)
    {
        $data = [
            'id_karyawan' => $id_karyawan,
        ];
        $this->ModelKaryawan->deleteData($data);
        session()->setFlashdata('pesan', "Data  berhasil dihapus");
        return redirect()->to('Karyawan')->withInput();
    }
}