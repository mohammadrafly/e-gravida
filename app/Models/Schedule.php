<?php

namespace App\Models;

use CodeIgniter\Model;

class Schedule extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'date',
        'user',
        'status'
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

    public function getJadwalByID(int $id)
    {
        $query = $this->db->table('jadwal')
            ->join('users', 'users.id = jadwal.user', 'left')
            ->where('jadwal.user', $id)
            ->get();
        return $query;
    }

    public function getJadwal()
    {
        $builder = $this->db->table('jadwal')
                ->join('users', 'jadwal.user = users.id', 'left')
                ->select('jadwal.*, users.name AS username')
                ->get();
        return $builder;
    }
}
