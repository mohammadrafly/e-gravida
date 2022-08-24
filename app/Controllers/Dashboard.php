<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Post;
use App\Models\Category;
use App\Models\Phones;
use App\Models\Kehamilan;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new Phones();
        $hamil = new Kehamilan();
        $data = [
            'pages' => 'Dashboard',
            'phone_private' => $model->where('kategori', 'PRIVATE')->first(),
            'phone_group' => $model->where('kategori', 'GROUP')->first(),
            'hamil' => $hamil->where('user', session()->get('id'))->first()
        ];
        return view('dashboard/index', $data);
    }
}
