<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyCartController extends Controller
{
    public function index()
    {

        
        // return view('my_cart');
        // $data = Session::all();
        // return $data;

        $data = Session::get('u_id');
        return $data;
        // return view('my_cart', compact('data'));
    }

}
