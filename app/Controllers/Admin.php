<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{

    public function __construct()
    {
       $this->ModelAdmin = new ModelAdmin();
    }
    public function index()
    {
        $data = [
            'judul' =>'Dashboard',
            'menu' => "dashboard",
            'page'=> "backend/v_dashboard"
        ];

        return view('v_template_back', $data);
    }

    public function setting(){
        $data= [
            'judul' => 'Setting',
            'menu' => 'setting',
            'page' => 'backend/v_Setting',
            'setting'=> $this->ModelAdmin->dataSetting(),
        ];
        return view('v_template_back', $data);
    }
    public function updateSetting(){
        $data= [
            'nama_kantor' => $this->request->getPost('nama_kantor'),
            'alamat' => $this->request->getPost('alamat'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
            'radius'=> $this->request->getPost('radius'),
        ];
        $this->ModelAdmin->updateSetting($data);
        session()->SetFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to('Admin/setting');
    }
}
