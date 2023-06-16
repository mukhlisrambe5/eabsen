<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        // $this->ModelAuth = new ModelAuth();
    }
    public function index()
    {
        return view('v_login');
    }

    public function cekLoginKaryawan()
    {
        
    }
}
