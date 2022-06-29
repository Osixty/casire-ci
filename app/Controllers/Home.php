<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['menu'] = "home";
        return view('/dashboard/home', $data);
    }
    public function casir()
    {
        $data['menu'] = "menu";
        return view('/user/home', $data);
    }
    public function checkout()
    {
        return view('user/checkout');
    }
}
