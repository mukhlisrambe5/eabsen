<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPresensi;

class Presensi extends BaseController
{
    public function __construct()
    {
        $this->ModelPresensi = new ModelPresensi();
    }
    public function index()
    {
        $presensi = $this->ModelPresensi->cekPresensi();
        if($presensi === null){
            //buka absen masuk
            $data= [
                'judul' => 'Absen Masuk',
                'menu' => 'presensi',
                'page' => 'presensi/v_absen_masuk',
                'kantor'=> $this->ModelPresensi->dataKantor(),
            ];
            return view('v_template_front', $data);
        }else{
            if($presensi['lokasi_out']== null or $presensi['foto_out']== null){
                //absen keluar
                $data= [
                    'judul' => 'Absen Pulang',
                    'menu' => 'presensi',
                    'page' => 'presensi/v_absen_pulang',
                    'kantor'=> $this->ModelPresensi->dataKantor(),
                ];
                return view('v_template_front', $data);
            }else{
                $data= [
                    'judul' => 'Sudah Absen',
                    'menu' => 'presensi',
                    'page' => 'presensi/v_sudah_absen',
                    'presensi' => $this->ModelPresensi->cekPresensi(),

                ];
                return view('v_template_front', $data);
            }
           
        }
        
    }

    public function insertPresensiIn()
    {
        // $foto = $this->request->getPost('image');
        // $id_karyawan = session()->get('id_karyawan');
        // $lokasi = $this->request->getPost('lokasi');
        // $folder_path = 'foto/';
        // $format_nama_file = $id_karyawan."-".date('Y-m-d')."-".date('His');

        // $image_parts = explode(";base64", $foto);
        // $image_base64 = base64_decode($image_parts[1]);
        // $file_name = $format_nama_file.".png";
        // $file= $folder_path . $file_name;

        if(isset($_POST['image'])){
            $id_karyawan = session()->get('id_karyawan');
            $lokasi = $this->request->getPost('lokasi');

            $base64img = $_POST['image'];
            $base64img = str_replace("data:image/jpeg;base64,", "", $base64img);
            $imageDecoded = base64_decode($base64img);
            $path = 'public/image/';
            $filename = $id_karyawan."-".date('Y-m-d')."-".date('His') . '.jpeg';

            $data = [
                'id_karyawan' => $id_karyawan,
                'tgl_presensi' => date('Y-m-d'),
                'jam_in'=> date('H:i:s'),
                'lokasi_in' => $lokasi,
                'foto_in'=>$filename,
            ];
            file_put_contents($path . $filename, $imageDecoded);

            // try{
            //     file_put_contents($path . $filename, $imageDecoded);
            //     $response = [
            //         'status' => 'success',
            //     ];
            // } catch(\Exception $e) {
            //     $response = [
            //         'status' => 'error',
            //         'message' => $e->getMessage(),
            //     ];
            // }
            // echo json_encode($response);

            $this->ModelPresensi->insertPresensiIn($data);
        }else{
            return redirect()->to('Home');
        }
       
    }
    public function insertPresensiOut()
    {
        
        // $presensi = $this->ModelPresensi->cekPresensi();
        // $id_presensi = $presensi['presensi_out'];
        if(isset($_POST['image'])){
            $presensi = $this->ModelPresensi->cekPresensi();
            $id_presensi = $presensi['id_presensi'];
        
            $id_karyawan = session()->get('id_karyawan');
            $lokasi = $this->request->getPost('lokasi');

            $base64img = $_POST['image'];
            $base64img = str_replace("data:image/jpeg;base64,", "", $base64img);
            $imageDecoded = base64_decode($base64img);
            $path = 'public/image/';
            $filename = $id_karyawan."-".date('Y-m-d')."-".date('His') . '.jpeg';

            $data = [
                'id_presensi' => $id_presensi,
                'jam_out'=> date('H:i:s'),
                'lokasi_out' => $lokasi,
                'foto_out'=>$filename,
            ];
            file_put_contents($path . $filename, $imageDecoded);
            $this->ModelPresensi->insertPresensiOut($data);
        }else{
            return redirect()->to('Home');
        }
    }

    public function izin()
    {
        
        $data= [
            'judul' => 'Izin',
            'menu' => 'izin',
            'page' => 'presensi/v_izin',
            'izin' => $this->ModelPresensi->dataIzin(),

        ];
        return view('v_template_front', $data);
    }
   
    public function pengajuanIzin()
    {
        
        $data= [
            'judul' => 'Pengajuan Izin',
            'menu' => 'izin',
            'page' => 'presensi/v_pengajuan_izin',
            'izin' => $this->ModelPresensi->dataIzin(),

        ];
        return view('v_template_front', $data);
    }
    public function submitIzin()
    {
        if($this->validate([
            'tgl_izin'=>[
                'label' => 'Tanggal Izin',
                'rules' => 'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong !'
                ]
            ],
            'status_izin'=>[
                'label' => 'Status Izin',
                'rules' => 'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong !'
                ]
            ],
            'ket_izin'=>[
                'label' => 'Keterangan Izin',
                'rules' => 'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong !'
                ]
            ],
        ])){
            $data= [
                'id_karyawan' => session()->get('id_karyawan'),
                'tgl_izin' => $this->request->getPost('tgl_izin'),
                'status_izin' => $this->request->getPost('status_izin'),
                'ket_izin' => $this->request->getPost('ket_izin'),
                ];
            $this->ModelPresensi->insertIzin($data);
            session()->setFlashdata('pesan', "Data Izin berhasil diajukan, silahkan menunggu konfirmasi");
            return redirect()->to('Presensi/izin')->withInput();
        }else{
            return redirect()->to('Presensi/pengajuanIzin')->withInput();
        }
    }
}