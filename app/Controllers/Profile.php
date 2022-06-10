<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\User;
use App\Models\Phones;

class Profile extends BaseController
{
    public function index($id)
    {
        $model = new User();
        $phones = new Phones();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'phone_private' => $phones->where('kategori', 'PRIVATE')->first(),
            'phone_group' => $phones->where('kategori', 'GROUP')->first(),
            'pages' => 'Profile',
        ];
        return view('profile/index', $data);
    }

    public function updatePassword()
    {
        if (!$this->validate([
            'old_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama harus diisi'
                ]
            ],
            'new_password' => [
                'rules' => 'required|min_length[6]|max_length[50]|is_unique[users.password]',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                    'min_length' => 'Password minimal 6 Karakter',
                    'max_length' => 'Password maksimal 50 Karakter',
                    'is_unique' => 'Anda sudah menggunakan sandi ini baru-baru ini. Pilih yang lain.',
                ]
            ],
            'new_password_conf' => [
                'rules' => 'matches[new_password]|required',
                'errors' => [
                    'required' => 'Konfirmasi password baru harus diisi',
                    'matches' => 'Konfirmasi password tidak sesuai dengan password di atas',
                ] 
            ],
        ])) {
            session()->setFlashdata('error_password', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new User();
        $username = session()->get('username');
        $password = $this->request->getVar('old_password');
        $dataAdmin = $users->where(['username' => $username,])->first();

        if ($dataAdmin) {
            if (password_verify($password, $dataAdmin['password'])) {
                $id = session()->get('id');
                $data = [
                    'password' => password_hash($this->request->getVar('new_password'), PASSWORD_BCRYPT),
                ];
                $users->update($id, $data);
                session()->setFlashData('success_password', 'Password telah diupdate!, Silahkan Relog untuk melihat detail terbaru anda.');
                return $this->response->redirect(site_url('dashboard/profile/'.session()->get('id').''));
            } else {
                session()->setFlashdata('error_password', 'Password Salah');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error_password', 'Password Salah');
            return redirect()->back()->withInput();
        }
    }
    
    function updateProfile()
    {
        if (!$this->validate([
            'profile' => [
                'rules' => 'mime_in[profile,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error_profile', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('profile');
        $randName = $img->getRandomName();
        $tanggallahir = $this->request->getVar('tanggallahir');

        $time = Time::parse($tanggallahir);
        $umur = $time->getAge();
        $today = Time::now('Asia/Jakarta')->toDateTime();

        //dd($today);
        
        
        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('profile',$randName);
            $model = new User();
            $id = $this->request->getVar('id');
            $data = [
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
                'suami' => $this->request->getVar('suami'),
                'tempatlahir' => $this->request->getVar('tempatlahir'),
                'tanggallahir' => $tanggallahir,
                'umur' => $umur,
                'alamat' => $this->request->getVar('alamat'),
                'profile' => $randName,
                'updated_at' => $today,
            ];
            $model->update($id, $data);
            session()->setFlashData('success_profile','Detail akun berhasil diupdate!');
            return $this->response->redirect(site_url('dashboard/profile/'.$id));
        } else {
            $model = new User();
            $id = $this->request->getVar('id');
            $data = [
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'suami' => $this->request->getVar('suami'),
                'tempatlahir' => $this->request->getVar('tempatlahir'),
                'tanggallahir' => $this->request->getVar('tanggallahir'),
                'umur' => $umur,
                'alamat' => $this->request->getVar('alamat'),
                'updated_at' => $today,
            ];
            $model->update($id, $data);
            session()->setFlashData('success_profile','Detail akun berhasil diupdate!');
            return $this->response->redirect(site_url('dashboard/profile/'.$id));
        }
    }
}
