@extends('todo.default')

@section('title', 'Todo List')

@section('from')
@error('title')
  <div>{{$message}}</div>
@enderror
  <form action="/add" method="post" class="from">
  @csrf
    <input class="top-from-tetle" type="text" cols="20" name="title" >
    <input class="from-btn_add" type="submit" value="追加">
    </form>
@endsection

@section('list')
  <div class="list">
    <table class="list-frist">
      <tr class="list-second">
        <th class="list-third">作成日</th>
        <th class="list-four">タスク名</th>
        <th class="list-five">更新</th>
        <th class="list-six">削除</th>
      </tr>
@foreach ($todos as $todo)
      <tr class="list-todo">
        <form action="/edit" method="post">
        <td>{{$todo->created_at}}</td>
        <td><input type="text" class="todo-upd" value="{{$todo->title}}" name="title"></td>
        <td>
            @csrf
            <input type="hidden" name="id" value="{{$todo->id}}">
            <input class="from-btn_upd" type="submit" value="更新">
        </td>
        </form>
        <td>
          <form action="/del" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$todo->id}}">
            <input class="from-btn_del" type="submit" value="削除">
          </form>
        </td>
      </tr>
@endforeach
    </table>
  </div>
@endsection
