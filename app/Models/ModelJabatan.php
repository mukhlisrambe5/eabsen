<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJabatan extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_jabatan')->get()->getResultArray();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_jabatan')->insert($data);
    }
    public function updateData($data)
    {
        $this->db->table('tbl_jabatan')
        ->where('id_jabatan', $data['id_jabatan'])
        ->update($data);
    }
    public function deleteData($data)
    {
        $this->db->table('tbl_jabatan')
        ->where('id_jabatan', $data['id_jabatan'])
        ->delete($data);
    }
}
