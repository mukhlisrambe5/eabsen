<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{

    public function __construct()
    {
       $this->ModelAuth = new ModelAuth();
    }
    public function index()
    {
        return view('v_login');
    }

    public function cekLoginKaryawan()
    {
        if($this->validate([
            'username'=>[
                'label' => 'Username',
                'rules' => 'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong !'
                ]
            ],
            'password'=>[
                'label' => 'Password',
                'rules' => 'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong !'
                ]
            ],
        ])){

            $username = $this->request->getPost('username');
            $password = sha1($this->request->getPost('password'));
            $cek = $this->ModelAuth->cekLoginKaryawan($username,$password);
            if($cek) {
                session()->set('id_karyawan', $cek['id_karyawan']);
                // session()->set('nama_jabatan', $cek['nama_jabatan']);
                session()->set('level', 2);
                return redirect()->to('Home');
            }else{
                session()->setFlashdata('pesan', 'Username atau Password salah');
                return redirect()->to('Auth');
            }
        }else{
            return redirect()->to('Auth')->withInput();
        }

    }

    public function loginAdmin(){
        return view('backend/v_login');
    }
    
    public function cekLoginUser()
    {
        if($this->validate([
            'username'=>[
                'label' => 'Username',
                'rules' => 'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong !'
                ]
            ],
            'password'=>[
                'label' => 'Password',
                'rules' => 'required',
                'errors'=> [
                    'required'=> '{field} tidak boleh kosong !'
                ]
            ],
        ])){

            $username = $this->request->getPost('username');
            $password = sha1($this->request->getPost('password'));
            $cek = $this->ModelAuth->cekLoginUser($username,$password);
            if($cek) {
                session()->set('id_user', $cek['id_user']);
                session()->set('level', 1);
                return redirect()->to('Admin');
            }else{
                session()->setFlashdata('pesan', 'Username atau Password salah');
                return redirect()->to('loginAdmin');
            }
        }else{
            return redirect()->to('loginAdmin')->withInput();
        }

    }
    public function logOut()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}