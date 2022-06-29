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
        return view('/user/home');
    }
    public function checkout()
    {
        return view('user/checkout');
    }
}
