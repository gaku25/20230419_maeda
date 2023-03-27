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
    return view('index', ['todos' => $todos]);
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

    public function edit(todoRequest $request)
  {
    $todos = todo::find($request->id);
    return view('edit', ['form' => $todos]);
  }

    public function upd(todoRequest $request)
  {
    $form = $request->all();
    unset($form['_token']);
    todo::where('id', $request->id)->update($form);
    return redirect('/');
  }
  
    public function del(todoRequest $request)
  {
    $todos = todo::find($request->id);
    return view('delete', ['form' => $todos]);
  }  

  public function remove(todoRequest $request)
  {
    todo::find($request->id)->delete();
    return redirect('/');
  }
}