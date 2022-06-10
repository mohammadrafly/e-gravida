<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;

class Kategori extends BaseController
{
    public function index()
    {
        helper('text');
        $model = new Category();
        $data = [
            'content' => $model->findAll(),
            'pages' => 'Master Kategori', 
        ];
        //dd($data);
        return view('kategori/index', $data);
    }

    public function add()
    {
        $data = [
            'id' => session()->get('id'),
            'pages' => 'Tambah Kategori',
        ];
        return view('kategori/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Category();
        $data = [
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'author' => $this->request->getVar('author'),
        ];
        $model->insert($data);
        session()->setFlashData('success','Berhasil upload kategori');
        return redirect()->to('dashboard/kategori');  
    }

    public function delete($id)
    {
        $model = new Category();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'Kategori berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/kategori'));
    }

    public function edit($id)
    {
        $model = new Category();
        //$parser = \Config\Services::parser();
        $data = [
            'id' => session()->get('id'),
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Edit Kategori',
        ];
        //echo "<pre>";
        //print_r($data);
        //($data);
        //echo $parser->setData($data)
        //          ->render('post/edit');
        return view('kategori/edit', $data);
        //var_dump($data);
    }

    public function update()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Category();
        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
        ];
        $model->update($id,$data);
        session()->setFlashData('success','Berhasil upload kategori');
        return redirect()->to('dashboard/kategori');  
    }
}
