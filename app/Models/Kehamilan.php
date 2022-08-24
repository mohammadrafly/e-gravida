<?php

namespace App\Models;

use CodeIgniter\Model;

class Kehamilan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kehamilan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user',
        'kandungan',
        'usia',
        'berat_terbaru',
        'berat_awal',
        'hpht',
        'prediksi',
        'tinggi',
        'kondisi',
        'tanggal_persalinan',
        'kondisi_bayi',
        'persalinan',
        'kondisi_ibu',
        'keterangan',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getKehamilan()
    {
        $builder = $this->db->table('kehamilan')
                ->join('users', 'kehamilan.user = users.id', 'left')
                ->select('kehamilan.*, users.name AS username')
                ->select('kehamilan.*, users.id AS id_user')
                ->where('role !=', 'admin')
                ->get();
        return $builder;
    }

    public function getKehamilanByID($id)
    {
        $builder = $this->db->table('kehamilan')
                ->join('users', 'kehamilan.user = users.id', 'left')
                ->select('kehamilan.*, users.name AS username')
                ->where('kehamilan.id', $id)
                ->get();
        return $builder;
    }

    public function RangeDate($start, $end)
    {
        $query = $this->db->table('kehamilan')
                ->join('users', 'kehamilan.user = users.id', 'left')
                ->where('kehamilan.created_at BETWEEN "'. date('Y-m-d', strtotime($start)). '" AND "'. date('Y-m-d', strtotime($end)).'"')
                ->where('role !=', 'admin')
                ->orderBy('kehamilan.created_at', 'DESC')
                ->get();
        return $query;
    }
}
