<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\VarianproductsModel;
use App\Models\VariantoptionsModel;
use Exception;
use CodeIgniter\API\ResponseTrait;

class Product extends BaseController
{
    use ResponseTrait;
    /*
    metot get 
    */
    public function index()
    {
        $data['menu'] = "product";
        return view('/Admin/Product/product', $data);
    }
    public function show($id = null)
    {
        //
    }
    public function new()
    {
        $data['menu'] = "addproduct";
        return view('/Admin/Product/addproduct', $data);
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
                $no++;
                $row = [];
                // $row[] = $no;
                $nama =  '<img src="' . $list['img'] . '"  height="60"> ' . '<br>' . $list['name'];
                $va = $modalx->where('id_primery', $list['id'])->findAll();
                $stok ='';// json_encode($vari);
                $terjual='';
                foreach ($va as $l) {
                  /*   $stok .=' <button type="button" class="rounded-pill m-1" style="border-color: '.$vari[$l['id_variantoptions']]['hex'].'; " data-bs-toggle="tooltip" data-bs-placement="top" title="'.$vari[$l['id_variantoptions']]['value'].'">';
                   // $stok .= $l['stok'] . '<br>' . ':' . $vari[$l['id_variantoptions']]['hex'];
                  // $stok .= '' $vari[$l['id_variantoptions']]['value'];
                    $stok .='<span >'.$l['stok'].'</span>';
                    $stok .=' </button>'; */
                    $stok .= $vari[$l['id_variantoptions']]['value'].' :<b>'.$l['stok'].'</b> '.'<hr class="m-0" style="color: '.$vari[$l['id_variantoptions']]['hex'].'; hight:2px ">';
                    $terjual.=$vari[$l['id_variantoptions']]['value'].' :<b>'.$l['terjual'].'</b> '.'<hr class="m-0" style="color: '.$vari[$l['id_variantoptions']]['hex'].'; hight:2px ">';
         
                }
                $row[] = $nama;
                $row[] = ($list['categoriestrue']) ? '<span class="badge bg-success">' . $list['categories'] . '</span>' : '<span class="badge bg-secondary">' . $list['categories'] . '</span>';
                $row[] = $stok;
                $row[] = $terjual;
                $row[] = '<button type="button" onclick="editc(' . $list['id'] . ')" class="btn btn-warning text-white btn-sm"><i class="fa-solid fa-pencil"></i></button>
                <button type="button" onclick="info(' . $list['id'] . ')" class="btn btn-info btn-sm mx-1"><i class="fa-solid fa-info"></i></button>';
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
