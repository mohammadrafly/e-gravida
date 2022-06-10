<?php

namespace App\Controllers;
use App\Models\Category;
use App\Models\Posts;

class Home extends BaseController
{
    public function login()
    {
        $data = [
            'Login' => TRUE,
            'pages' => 'Masuk'
        ];
        return view('index', $data);
    }

    public function register()
    {
        $data = [
            'Login' => FALSE,
            'pages' => 'Daftar'
        ];
        return view('auth/register', $data);
    }

    public function index()
    {
        helper('text');
        $cats = new Category();
        $model = new Posts();
        $data = [
            'cats' => $cats->findAll(),
            'content' => $model->getPost()->getResult()
        ];
        return view('home/index', $data);
    }

    public function artikel($id)
    {
        helper('text');
        $model = new Posts();
        $cats = new Category();
        $data = [
            'title' => $model->where('id', $id)->first(),
            'id' => $id,
            'cats' => $cats->findAll(),
            'content' => $model->getPostByID($id)->getResult(),
        ];
        return view('artikel/single-page', $data);
    }

    public function artCat($id)
    {
        helper('text');
        $model = new Posts();
        $cats = new Category();
        $data = [
            'id' => $id,
            'cats' => $cats->findAll(),
            'catsbyid' => $cats->where('id', $id)->first(),
            'content' => $model->getPostByIDCats($id)->getResult()
        ];
        return view('artikel/category', $data);
    }
}
