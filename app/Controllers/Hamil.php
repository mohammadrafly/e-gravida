<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kehamilan;
use App\Models\Phones;

class Hamil extends BaseController
{
    public function exportPdf()
    {
        $dompdf = new \Dompdf\Dompdf();
        $model = new Kehamilan();
        $start = $this->request->getVar('tgl_mulai');
        $end = $this->request->getVar('tgl_akhir');
        $data = [
            'loop' => $model->RangeDate($start,$end)->getResult(),
        ]; 
        //dd($data);
        $dompdf->loadHtml(view('hamil/pdf', $data));
        $dompdf->setPaper('A4', 'portrait'); 
        $dompdf->render();
        $dompdf->stream('Laporan Kandungan'); 
 
        return redirect()->to(base_url('dashboard/kandungan')); 
    }

    public function index($id)
    {
        $model = new Kehamilan();
        $phones = new Phones();
        $data = [
            'phone_private' => $phones->where('kategori', 'PRIVATE')->first(),
            'phone_group' => $phones->where('kategori', 'GROUP')->first(),
            'content' => $model->where('user', $id)->first(),
            'pages' => 'Kondisi Kehamilan'
        ];
        return view('hamil/index', $data);
    }

    public function store()
    {
        $model = new Kehamilan();
        $id = $this->request->getVar('id');
        $user = $this->request->getVar('user');
        $hpht = $this->request->getVar('test');
        $tinggi = $this->request->getVar('tinggi');
        $prediksi = $this->request->getVar('prediksi');
        $usia = $this->request->getVar('usia');
        $berat_terbaru = $this->request->getVar('berat_terbaru');
        /*
        if ($hpht < '2022/03/30') {
            $bulan = date('Y-m-d', strtotime('-3 month', strtotime($hpht)));
            $tanggal = date('Y-m-d', strtotime('+7 days', strtotime($bulan)));
            $perkiraanLahir = date('Y-m-d', strtotime('+1 year', strtotime($tanggal))); 
        } elseif ($hpht > '2022/03/30') {
            $bulan = date('Y-m-d', strtotime('-5 month', strtotime($hpht)));
            $tanggal = date('Y-m-d', strtotime('+7 days', strtotime($bulan)));
            $perkiraanLahir = date('Y-m-d', strtotime('+1 year', strtotime($tanggal))); 
        }
        */
        
        if ($tinggi >= 160) {
            $ntb = '110';
        } elseif ($tinggi < 160 && $tinggi >= 150) {
            $ntb = '105';
        } else {
            $ntb = '100';
        }
        
        $bbi = $tinggi - $ntb;
        $beratIdeal = $bbi + ($usia * (7 / 20));

        if ($berat_terbaru == $beratIdeal) {
            $kondisi = 'IDEAL';
        } elseif ($berat_terbaru < $beratIdeal) {
            $kondisi = 'TERLALU KURUS';
        } else {
            $kondisi = 'TERLALU GEMUK';
        }

        $data = [
            'kandungan' => $this->request->getVar('kandungan'),
            'usia' => $usia,
            'berat_terbaru' => $berat_terbaru,
            'berat_awal' => $this->request->getVar('berat_awal'),
            'hpht' => $hpht,
            'tinggi' => $tinggi,
            'prediksi' => $prediksi,
            'kondisi' => $kondisi
        ];
        //dd($data);
        $model->update($id, $data);
        session()->setFlashData('success','Detail kandungan berhasil diupdate!');
        return $this->response->redirect(site_url('dashboard/kondisikehamilan/'.$user));
    } 

    public function storeAdmin()
    {
        $model = new Kehamilan();
        $id = $this->request->getVar('id');
        $user = $this->request->getVar('user');
        $hpht = $this->request->getVar('hpht');
        $tinggi = $this->request->getVar('tinggi');
        $prediksi = $this->request->getVar('prediksi');
        $usia = $this->request->getVar('usia');
        $berat_terbaru = $this->request->getVar('berat_terbaru');
        
        if ($tinggi >= 160) {
            $ntb = '110';
        } elseif ($tinggi < 160 && $tinggi >= 150) {
            $ntb = '105';
        } else {
            $ntb = '100';
        }
        
        $bbi = $tinggi - $ntb;
        $beratIdeal = $bbi + ($usia * (7 / 20));
        //dd($usia);

        if ($berat_terbaru == $beratIdeal) {
            $kondisi = 'IDEAL';
        } elseif ($berat_terbaru < $beratIdeal) {
            $kondisi = 'TERLALU KURUS';
        } else {
            $kondisi = 'TERLALU GEMUK';
        }

        $data = [
            'kandungan' => $this->request->getVar('kandungan'),
            'usia' => $usia,
            'berat_terbaru' => $berat_terbaru,
            'berat_awal' => $this->request->getVar('berat_awal'),
            'hpht' => $hpht,
            'tinggi' => $tinggi,
            'prediksi' => $prediksi,
            'kondisi' => $kondisi,
            'tanggal_persalinan' => $this->request->getVar('tanggal_persalinan'),
            'kondisi_bayi' => $this->request->getVar('kondisi_bayi'),
            'persalinan' => $this->request->getVar('persalinan'),
            'kondisi_ibu' => $this->request->getVar('kondisi_ibu'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];

        $model->update($id, $data);
        session()->setFlashData('success','Detail kandungan berhasil diupdate!');
        return $this->response->redirect(site_url('dashboard/kandungan/admin'));
    } 
    
    public function edit($id)
    {
        $model = new Kehamilan();
        $phones = new Phones();
        $data = [
            'phone_private' => $phones->where('kategori', 'PRIVATE')->first(),
            'phone_group' => $phones->where('kategori', 'GROUP')->first(),
            'pages' => 'Edit Kandungan',
            'content' => $model->getKehamilanByID($id)->getResult(),
        ];
        //dd($data);
        return view('hamil/edit', $data);
    }

    public function indexAdmin()
    {
        $model = new Kehamilan();
        $data = [
            'pages' => 'Master Kandungan',
            'content' => $model->getKehamilan()->getResult(),
        ];
        //dd($data);
        return view('hamil/indexadmin', $data);
    }

    public function selectDate()
    {
        $data = [
            'pages' => 'Export PDF Kandungan',
        ];
        return view('hamil/indexPdf', $data);
    }
}
