<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Phones;

class Jadwal extends BaseController
{
    public function index($id)
    {
        $model = new Schedule();
        $phones = new Phones();
        $data = [
            'phone_private' => $phones->where('kategori', 'PRIVATE')->first(),
            'phone_group' => $phones->where('kategori', 'GROUP')->first(),
            'content' => $model->getJadwalByID($id)->getResult(),
            'pages' => 'Jadwal'
        ];
        //dd($data);
        return view('jadwal/index', $data);
    }

    public function indexAdmin()
    {
        $model = new Schedule();
        $data = [
            'content' => $model->getJadwal()->getResult(),
            'pages'=> 'Master Jadwal'
        ];
        return view('jadwal/indexadmin', $data);
    }

    public function add()
    {
        $model = new User();
        $data = [
            'user' => $model->findAll(),
            'pages' => 'Tambah Jadwal',
        ];
        return view('jadwal/add', $data);
    }

    public function store()
    {
        $model = new Schedule();
        $data = [
            'title' => $this->request->getVar('title'),
            'date' => $this->request->getVar('date'),
            'user' => $this->request->getVar('user'),
            'status' => 'UNDONE',
        ];
        $model->insert($data);
        session()->setFlashData('success','Berhasil upload jadwal');
        return redirect()->to('dashboard/jadwal');
    }

    public function delete($id)
    {
        $model = new Schedule();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'Jadwal berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/jadwal'));
    }

    public function edit($id)
    {
        $model = new Schedule();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Edit Jadwal',
        ];
        return view('jadwal/edit', $data);
    }

    public function update()
    {
        $model = new Schedule();
        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getVar('title'),
            'status' => $this->request->getVar('status'),
            'date' => $this->request->getVar('date'),
            'lila' => $this->request->getVar('lila'),
            'pmt_pemulihan' => $this->request->getVar('pmt_pemulihan'),
            'tambah_darah' => $this->request->getVar('tambah_darah'),
            'imunisasi_tt' => $this->request->getVar('imunisasi_tt'),
            'kapsul_yodium' => $this->request->getVar('kapsul_yodium'),
            'hasil_penimbangan' => $this->request->getVar('hasil_penimbangan'),
            'resiko' => $this->request->getVar('resiko'),
            'hasil_pemeriksaan' => $this->request->getVar('hasil_pemeriksaan'),
        ];
        $model->update($id,$data);
        session()->setFlashData('success','Berhasil update jadwal');
        return redirect()->to('dashboard/jadwal');  
    }

    public function detail($id)
    {
        $model = new Schedule();
        $phones = new Phones();
        $data = [
            'phone_private' => $phones->where('kategori', 'PRIVATE')->first(),
            'phone_group' => $phones->where('kategori', 'GROUP')->first(),
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Detail Pemeriksaan',
        ];
        //dd($data);
        return view('jadwal/detail', $data);
    }
}
