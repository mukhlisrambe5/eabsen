<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKaryawan extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_karyawan')
        ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan=tbl_karyawan.id_jabatan', 'LEFT')
        ->get()->getResultArray();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_karyawan')->insert($data);
    }
    public function updateData($data)
    {
        $this->db->table('tbl_karyawan')
        ->where('id_karyawan', $data['id_karyawan'])
        ->update($data);
    }
    public function deleteData($data)
    {
        $this->db->table('tbl_karyawan')
        ->where('id_karyawan', $data['id_karyawan'])
        ->delete($data);
    }
}
