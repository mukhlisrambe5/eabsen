<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function dataKaryawan()
    {
        return $this->db->table('tbl_karyawan')
        ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan=tbl_karyawan.id_jabatan', 'LEFT')
        ->where('id_karyawan', session()->get('id_karyawan'))->get()->getRowArray();
    }
    public function cekPresensi()
    {
        return $this->db->table('tbl_presensi')
        ->where('id_karyawan', session()->get('id_karyawan'))
        ->where('tgl_presensi', date('Y-m-d'))
        ->get()->getRowArray();
    }

    public function presensiPerbulan(){
        return $this->db->table('tbl_presensi')
        ->where('id_karyawan', session()->get('id_karyawan'))
        ->where('month(tgl_presensi)', date('m'))
        ->where('year(tgl_presensi)', date('Y'))
        ->get()->getResultArray();
    }

    public function leaderboard(){
        return $this->db->table('tbl_presensi')
        ->join('tbl_karyawan', 'tbl_karyawan.id_karyawan = tbl_presensi.id_karyawan', 'LEFT')
        ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan=tbl_karyawan.id_jabatan', 'LEFT')
        ->where('tgl_presensi', date('Y-m-d'))
        ->orderBy('tbl_presensi.Id_presensi', 'DESC')
        ->get()->getResultArray();
    }

    public function historyPresensi($bulan, $tahun){
        return $this->db->table('tbl_presensi')
        ->where('id_karyawan', session()->get('id_karyawan'))
        ->where('month(tgl_presensi)', $bulan)
        ->where('year(tgl_presensi)', $tahun)
        ->get()->getResultArray();
    }
}
