<?php

namespace App\Models;

use CodeIgniter\Model;

class Posts extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'post';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'content',
        'category',
        'status',
        'author',
        'picture'
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

    public function getPost()
    {
        $builder = $this->db->table('post')
                ->join('category', 'post.category = category.id', 'left')
                ->join('users', 'post.author = users.id', 'left')
                ->select('post.*, category.title AS cat_name')
                ->select('post.*, users.name AS username')
                ->get();
        return $builder;
    }

    public function getPostByID($id)
    {
        $builder = $this->db->table('post')
                ->join('category', 'post.category = category.id', 'left')
                ->join('users', 'post.author = users.id', 'left')
                ->select('post.*, category.title AS cat_name')
                ->select('post.*, users.name AS username')
                ->where('post.id', $id)
                ->get();
        return $builder;
    }

    public function getPostByIDCats($id)
    {
        $builder = $this->db->table('post')
                ->join('category', 'post.category = category.id', 'left')
                ->join('users', 'post.author = users.id', 'left')
                ->select('post.*, category.title AS cat_name')
                ->select('post.*, users.name AS username')
                ->where('post.category', $id)
                ->get();
        return $builder;
    }
}
