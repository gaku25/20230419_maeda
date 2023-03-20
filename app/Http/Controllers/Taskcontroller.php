<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\todoRequest;

class Taskcontroller extends Controller
{
    public function index()
  {
    return view('index');
  }

    public function add()
  {
    return view('add');
  }

    public function upd()
  {
    return view('upd');
  }
  
    public function del()
  {
    return view('del');
  }  
}