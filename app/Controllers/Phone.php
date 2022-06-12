<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Phones;

class Phone extends BaseController
{
    public function index()
    {
        $model = new Phones();
        $data = [
            'pages' => 'Data Link Private Chat/Group',
            'content' => $model->findAll(),
        ];
        return view('phone/index', $data);
    }

    public function edit($id)
    {
        $model = new Phones();
        $data = [
            'pages' => 'Edit Data Link Private Chat/Group',
            'content' => $model->where('id', $id)->first(),
        ];
        return view('phone/edit', $data);
    }

    public function update()
    {
        $model = new Phones();
        $id = $this->request->getVar('id');
        $data = [
            'phone' => $this->request->getVar('phone'),
            'kategori' => $this->request->getVar('kategori')
        ];
        if ($model->update($id,$data)) {
            session()->setFlashData('success','Data telah diupdate!');
            return $this->response->redirect(site_url('dashboard/phone'));
        } else {
            'Error';
        }
    }

    public function add()
    {
        $data = [
            'pages' => 'Tambah Data Link Private Chat/Group'
        ];
        return view('phone/add', $data);
    }

    public function store()
    {
        $model = new Phones();
        $data = [
            'phone' => $this->request->getVar('phone'),
            'kategori' => $this->request->getVar('kategori')
        ];
        if($model->where('kategori', 'PRIVATE')->first() === NULL) {
            if ($model->save($data)) {
                session()->setFlashData('success','Data telah ditambah!');
                return $this->response->redirect(site_url('dashboard/phone'));
            } else {
                'Error';
            }
        } elseif($model->where('kategori', 'GROUP')->first() === NULL) {
            if ($model->save($data)) {
                session()->setFlashData('success','Data telah ditambah!');
                return $this->response->redirect(site_url('dashboard/phone'));
            } else {
                'Error';
            }
        } else {
            session()->setFlashData('error','Kategori tersebut sudah ada!');
            return $this->response->redirect(site_url('dashboard/phone'));
        }
    }

    public function delete($id) 
    {
        $model = new Phones();
        if ($model->where('id', $id)->delete($id)) {
            session()->setFlashData('success','Data telah dihapus!');
            return $this->response->redirect(site_url('dashboard/phone'));
        } else {
            'Error';
        }
    }
}
