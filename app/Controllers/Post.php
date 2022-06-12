<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Posts;
use App\Models\Category;
use App\Models\User;

class Post extends BaseController
{
    public function index()
    {
        helper('text');
        $model = new Posts();
        $data = [
            'content' => $model->getPost()->getResult(),
            'pages' => 'Master Post', 
        ];
        //dd($data);
        return view('post/index', $data);
    }

    public function add()
    {
        $kategori = new Category();
        $data = [
            'id' => session()->get('id'),
            'pages' => 'Tambah Post',
            'category' => $kategori->findAll()
        ];
        return view('post/add', $data);
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
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'picture' => [
                'rules' => 'mime_in[picture,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('picture');
        $randName = $img->getRandomName();

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('picture',$randName);
            $model = new Posts();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'author' => $this->request->getVar('author'),
                'category' => $this->request->getVar('category'),
                'status' => $this->request->getVar('status'),
                'picture' => $randName,
            ];
            $model->insert($data);
            session()->setFlashData('success','Berhasil upload post');
            return redirect()->to('dashboard/post');         
        } else {
            $model = new Posts();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'author' => $this->request->getVar('author'),
                'category' => $this->request->getVar('category'),
                'status' => $this->request->getVar('status'),
            ];
            $model->insert($data);
            session()->setFlashData('success','Berhasil upload post');
            return redirect()->to('dashboard/post');
        }
    }

    public function delete($id)
    {
        $model = new Posts();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'Post berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/post'));
    }
    
    public function edit($id)
    {
        $model = new Posts();
        $cats = new Category();
        //$parser = \Config\Services::parser();
        $data = [
            'id' => session()->get('id'),
            'category' => $cats->findAll(),
            'content' => $model->getPostByID($id)->getResult(),
            'pages' => 'Edit Post',
        ];
        //echo "<pre>";
        //print_r($data);
        //($data);
        //echo $parser->setData($data)
        //          ->render('post/edit');
        return view('post/edit', $data);
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
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'picture' => [
                'rules' => 'mime_in[picture,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('picture');
        $randName = $img->getRandomName();
        $id = $this->request->getVar('id');

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('picture',$randName);
            $model = new Posts();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'category' => $this->request->getVar('category'),
                'status' => $this->request->getVar('status'),
                'picture' => $randName,
            ];
            $model->update($id,$data);
            session()->setFlashData('success','Berhasil update post');
            return redirect()->to('dashboard/post');
        } else {
            $model = new Posts();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'category' => $this->request->getVar('category'),
                'status' => $this->request->getVar('status'),
            ];
            $model->update($id,$data);
            session()->setFlashData('success','Berhasil update post');
            return redirect()->to('dashboard/post');
        }
    }
}   
