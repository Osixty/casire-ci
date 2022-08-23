<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\VarianproductsModel;
use App\Models\VariantoptionsModel;
use Exception;
use CodeIgniter\API\ResponseTrait;

class Casir extends BaseController
{
    use ResponseTrait;
    /*
    metot get 
    */
    public function index()
    {
        
    }
    public function show($id = null)
    {
        //
    }
    public function new()
    {
        //
    }
    public function edit($id = null)
    {
        //
    }

    /* 
    metot pos  
    */
    public function create()
    {
        //
    }
    public function update($id = null)
    {
        //
    }
    public function delete($id = null)
    {
        //
    }
    public function ajaxList()
    {
        $modalx = new VarianproductsModel();
        $model = new ProductModel();
        $varian = new VariantoptionsModel();
        $v = $varian->findAll();
        $vari = [];
        foreach ($v as $lx) {
            $vari[$lx['id']] = $lx;
        }
        $method = strtoupper($this->request->getMethod());
        if ($method === 'POST') {
            $lists = $model->getDatatables();
            $data = [];
            $no = $this->request->getPost('start');

            foreach ($lists as $list) {
                
                $row = [];
                $nama =  '<img src="' . $list['img'] . '" class="mb-4 mt-3"  height="100"> ' . '<br>' . $list['name'];
                
                
                // row implementasi
                $row[] = $nama;
                $row[] = $nama;
                $row[] = $nama;
                $row[] = $nama;
                $row[] = $nama;
                $row[] = $nama;
                
                $data[] = $row;
            }

            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $model->countAll(),
                'recordsFiltered' => $model->countFiltered(),
                'data' => $data,
                'token' => csrf_hash()
            ];

            echo json_encode($output);
        }
    
    }

}