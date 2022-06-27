<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class CategoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name',  'dsc'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'name' => 'required|is_unique[categories.name]',
        'dsc' => 'string',

    ];
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



    protected $column_order = ['name', 'dsc'];
    protected $column_search = ['name', 'dsc'];
    protected $order = ['id' => 'DESC'];
    protected $request;
    protected $db;
    protected $dt;



    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_POST['search']['value']);
                } else {
                    $this->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->orderBy($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($_POST['length'] != -1)
            //   $this->limit($_POST['length'],  $_POST['start']);
            /*  $query = $this->get();
        return $query->getResult(); */
            return $this->findAll($_POST['length'],  $_POST['start']);
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->countAllResults();
    }

    public function countAll()
    {
        /*  $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults(); */
        return $this->countAllResults();
    }
}
