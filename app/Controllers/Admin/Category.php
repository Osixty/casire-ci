<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use Exception;
use CodeIgniter\API\ResponseTrait;

class Category extends BaseController
{
    use ResponseTrait;
    /*
    metot get 
    */
    public function index()
    {
        $data['menu'] = "category";
        return view('/Admin/Product/category', $data);
    }
    public function show($id = null)
    {
        //
    }
    public function new()
    {
        $data['menu'] = "addcategory";
        return view('/Admin/Product/addcategory', $data);
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
        //load helper form and URL
        helper(['form', 'url']);
        $rules = [
            'name' => 'required|is_unique[categories.name]',
            'dsc' => 'string',
        ];

        /** @var Validation $validation */
        $validation = service('validation');

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        } else {

            //model initialize
            $postModel = new CategoryModel();

            //insert data into database
            if (!$postModel->insert([
                'name'   => $this->request->getPost('name'),
                'dsc' => $this->request->getPost('dsc'),
            ])) {
                return $this->fail($postModel->errors());
            } else {
                return $this->respondCreated();
            }
        }
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
        $model = new CategoryModel();
        $method = strtoupper($this->request->getMethod());
        if ($method === 'POST') {
            $lists = $model->getDatatables();
            $data = [];
            $no = $this->request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                // $row[] = $no;

                $row[] = $list['name'];
                $row[] = $list['dsc'];
                $row[] = ($list['active']) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
                $row[] = '<button type="button" onclick="editc(' . $list['id'] . ')" class="btn btn-info text-white btn-sm"><i class="fa-solid fa-pencil"></i></button>
                <button type="button" onclick="delc(' . $list['id'] . ')" class="btn btn-danger btn-sm mx-1"><i class="fa-solid fa-trash-can"></i></button>';
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
    public function get($id = null)
    {
        $Model = new CategoryModel();
        if (!$id == null) {
            try {
                $data = $Model->select(' id, name, dsc,	active')->find($id);

                if (!$data) {
                    return $this->failNotFound(
                        " tidak ditemmukan"
                    );
                }
                return $this->respond([
                    'status' => 200,
                    'messages'    => 'OK',
                    'data'       => $data
                ], 200);
            } catch (Exception $exception) {
                return $this->fail($exception->getMessage());
            }
        }
    }
}
