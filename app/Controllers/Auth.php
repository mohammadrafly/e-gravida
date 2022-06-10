<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Kehamilan;

class Auth extends BaseController
{
    public function login()
    {
        $model = new User();
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[15]',
                'errors' => [
                    'required' => 'username harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        $kehamilan = new Kehamilan();
        if ($data) {
            $pass = $data['password'];
            $konfirmasiPassword = password_verify($password, $pass);
            if ($konfirmasiPassword) {
                $setData = [
                    'id'        => $data['id'],
                    'username'  => $data['username'],
                    'password'  => $data['password'],
                    'phone'     => $data['phone'],
                    'role'      => $data['role'],
                    'name'      => $data['name'],
                    'profile'   => $data['profile'],
                    'email'     => $data['email'],
                    'WesLogin'  => TRUE,
                ];
                $hamil = [
                    'user' => $data['id']
                ];
                $ibu = $kehamilan->where('user', $hamil['user'])->first();
                if ($ibu === NULL) {
                    if ($kehamilan->save($hamil)) {
                        if($data['role'] === 'customer') {
                            session()->set($setData);
                            return redirect()->to('dashboard/profile/'.$data['id']);
                        } elseif ($data['role'] === 'admin') {
                            session()->set($setData);
                            return redirect()->to('dashboard');
                        }
                    } else {
                        die();
                    }
                } else {
                    if ($data['role'] === 'customer') {
                        session()->set($setData);
                        return redirect()->to('dashboard/profile/'.$data['id']);
                    } elseif($data['role'] === 'admin') {
                        session()->set($setData);
                        return redirect()->to('dashboard');
                    }
                    session()->set($setData);
                    return redirect()->to('dashboard/profile/'.$data['id']);
                }
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ada di database!');
            return redirect()->to('login');
        }
    }

    public function store()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[15]|is_unique[users.username]',
                'errors' => [
                    'required' => 'username harus diisi',
                    'min_length' => 'username minimal 4 Karakter',
                    'max_length' => 'username maksimal 15 Karakter',
                    'is_unique' => 'username sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 Karakter',
                    'max_length' => 'Password maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sesuai dengan password di atas',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $model = new User();
        $data = [
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'      => 'customer',
        ];
        if ($model->save($data)) {
            session()->setFlashdata('success', 'Anda telah berhasil daftar silahkan login.');
            return redirect()->to('login');
        } else {
            session()->setFlashdata('error', 'Terjadi Error!');
            return redirect()->to('register');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
