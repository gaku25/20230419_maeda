<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\todoRequest;

class TaskController extends Controller
{
    public function index()
  {
    $todos = todo::all();
    return view('index', ['todos' => $todos]);;
  }

  public function add()
  {
    $todos = todo::all();
    return view('add', ['todos' => $todos]);
  }

   public function create(todoRequest $request)
  {
    $form = $request->all();
    unset($form['_token']);
    todo::create($form);
    return redirect('/');
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