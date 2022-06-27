<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Product extends BaseController
{
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
}
