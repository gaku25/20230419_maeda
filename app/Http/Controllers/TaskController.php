<?php

namespace App\Http\Controllers;

use App\Models\todo;
use App\Models\tag;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\todoRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  public function index()
  {
    $todos = todo::all();

    $user = Auth::user();
    $tags = tag::all();
    $param = ['todos' => $todos, 'user' =>$user, 'tags' =>$tags];
    return view('index', $param);
  }

  public function create(todoRequest $request)
  {
    $title = $request->input('title');
    $tag_id = $request->input('tag_id');
    $user_id = Auth::id();
    $todo = [
        'title' => $title,
        'tag_id' => $tag_id,
        'user_id' => $user_id,
    ];
    todo::create($todo);
    return redirect('/');
  }

  public function update(todoRequest $request)
  {
    $title = $request->input('title');
    $tag_id = $request->input('tag_id');
    $todo = [
        'title' => $title,
        'tag_id' => $tag_id,
    ];
    todo::where('id', $request->id)->update($todo);
    return redirect('/');
  }

  public function remove(Request $request)
  {
    todo::find($request->id)->delete();
    return redirect('/');
  }

  public function find(Request $request)
  {
    $user = Auth::user();
    $tags = tag::all();
    $todos = [];
    return view('search', compact('user', 'todos', 'tags'))->with('loginWeb', 'auth.login');
  }

  public function search(Request $request)
  {
    $user = Auth::user();
    $tags = tag::all();
    $keyword = $request->input('keyword');
    $tag_id = $request->input('tag_id');
    $todo = new todo();
    $todos = $todo->doSearch($keyword, $tag_id);
    return view('search', compact('user', 'todos', 'tags'));
}
}
