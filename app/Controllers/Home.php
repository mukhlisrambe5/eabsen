<?php

namespace App\Controllers;
use App\Models\ModelHome;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }
    public function index()
    {
        $data= [
            'judul' => 'Home',
            'menu' => 'home',
            'page' => 'v_home',
            'karyawan'=> $this->ModelHome->dataKaryawan(),
            'presensi'=>$this->ModelHome->cekPresensi(),
            'history'=> $this->ModelHome->presensiPerbulan(),
            'leaderboard' =>$this->ModelHome->leaderboard(),
        ];
        return view('v_template_front', $data);
    }

    public function profile()
    {
        $data= [
            'judul' => 'Profile',
            'menu' => 'profile',
            'page' => 'v_profile'
        ];
        return view('v_template_front', $data);
    }

    public function history()
    {
        $data= [
            'judul' => 'History Presensi',
            'menu' => 'history',
            'page' => 'presensi/v_history'
        ];
        return view('v_template_front', $data);
    }

    public function viewHistory()
    {
        $bulan= $this->request->getPost('bulan');
        $tahun= $this->request->getPost('tahun');
        $data= [
            'databulanan' => $this->ModelHome->historyPresensi($bulan, $tahun),
        ];
        $response= [
            'data' => view('presensi/v_data_history', $data),
        ];
        echo json_encode($response);
    }
    
}
