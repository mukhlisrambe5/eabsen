<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
   public function cekLoginKaryawan($username, $password)
   {
    return $this->db->table('tbl_karyawan')
    ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan=tbl.karyawan.id_jabatan', 'LEFT')
    ->where([
        'username'=> $username,
        'password'=> $password,
    ])->get()->getRowArray();
   }
}
