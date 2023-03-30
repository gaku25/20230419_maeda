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

  public function create(todoRequest $request)
  {
    $form = $request->all();
    unset($form['_token']);
    todo::create($form);
    return redirect('/');
  }

  public function update(todoRequest $request)
  {
    $form = $request->all();
    unset($form['_token']);
    todo::where('id', $request->id)->update([
      'title' => $form['title']
    ]);
    return redirect('/');
  }  

  public function remove(Request $request)
  {
    todo::find($request->id)->delete();
    return redirect('/');
  }
}