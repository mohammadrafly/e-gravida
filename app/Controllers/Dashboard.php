<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Prediction;
use App\Models\Jadwal;
use App\Models\Post;
use App\Models\Category;
use App\Models\Phones;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new Phones();
        $data = [
            'pages' => 'Dashboard',
            'phone_private' => $model->where('kategori', 'PRIVATE')->first(),
            'phone_group' => $model->where('kategori', 'GROUP')->first(),
        ];
        return view('dashboard/index', $data);
    }
}
