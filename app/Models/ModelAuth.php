<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function cekLoginKaryawan($username, $password)
    {
        return $this->db->table('tbl_karyawan')
        ->where([
            'username'=> $username,
            'password'=> $password,
        ])->get()->getRowArray();
    }

    public function cekLoginUser($username, $password)
    {
        return $this->db->table('tbl_user')
        ->where([
            'username'=> $username,
            'password'=> $password,
        ])->get()->getRowArray(); 
    }
}
