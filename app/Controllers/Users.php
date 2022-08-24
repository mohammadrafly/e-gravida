<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\User;

class Users extends BaseController
{
    public function exportPdf()
    {
        $dompdf = new \Dompdf\Dompdf();
        $model = new User();
        $start = $this->request->getVar('tgl_mulai');
        $end = $this->request->getVar('tgl_akhir');
        $data = [
            'loop' => $model->RangeDate($start,$end)->getResult(),
        ]; 
        //dd($data);
        $dompdf->loadHtml(view('user/pdf', $data));
        $dompdf->setPaper('A4', 'portrait'); 
        $dompdf->render();
        $dompdf->stream('Laporan Users'); 
 
        return redirect()->to(base_url('dashboard/user')); 
    }

    public function selectDate()
    {
        $data = [
            'pages' => 'Export PDF User',
        ];
        return view('user/indexPdf', $data);
    }

    public function index()
    {
        $model = new User();
        $data = [
            'pages' => 'Master User',
            'content' => $model->GetUserWithoutSU()->getResult(),
        ];
        return view('user/index', $data);
    }

    public function add()
    {   
        $data = [
            'pages' => 'Tambah User',
        ];
        return view('user/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'is_unique' => '{field} Sudah terpakai',
                    'required' => '{field} Harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error_profile', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $tanggallahir = $this->request->getVar('tanggallahir');
        $time = Time::parse($tanggallahir);
        $umur = $time->getAge();
        $model->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'role' => $this->request->getVar('role'),
            'suami' => $this->request->getVar('suami'),
            'tempatlahir' => $this->request->getVar('tempatlahir'),
            'tanggallahir' => $this->request->getVar('tanggallahir'),
            'alamat' => $this->request->getVar('alamat'),
            'umur' => $umur
        ]);
        session()->setFlashData('success','Berhasil menambah user!');
        return $this->response->redirect(site_url('dashboard/user'));
    }

    public function edit($id)
    {
        $model = new User();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Edit User'
        ];
        return view('user/edit', $data);
    }

    public function update()
    {
        $model = new User();
        $tanggallahir = $this->request->getVar('tanggallahir');
        $time = Time::parse($tanggallahir);
        $umur = $time->getAge();
        $id = $this->request->getVar('id');
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'role' => $this->request->getVar('role'),
            'suami' => $this->request->getVar('suami'),
            'tempatlahir' => $this->request->getVar('tempatlahir'),
            'tanggallahir' => $this->request->getVar('tanggallahir'),
            'alamat' => $this->request->getVar('alamat'),
            'umur' => $umur
        ];
        $model->update($id,$data);
        session()->setFlashData('success','Berhasil update user!');
        return $this->response->redirect(site_url('dashboard/user'));
    }

    public function delete($id)
    {   
        $model = new User();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success','Berhasil menghapus user!');
        return $this->response->redirect(site_url('dashboard/user'));
    }
}
