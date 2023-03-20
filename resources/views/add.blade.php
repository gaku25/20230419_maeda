@extends('todo.default')
<style>
  body {
  background-color: rgb(48, 22, 139);
  }

  .top {
  background-color: rgb(255, 255, 255);
  width: 1000px;
  height: 200px;
  margin: 200px  auto;
  padding: 20px 20px;
  border-radius:2%;
  }

  .top-tetle {

  }

  .list-frist {
  display: flex;
  justify-content: space-between;
  margin-left:20px;
  }

  .list-second {
  padding-left:150px;
  }
  

  .from-tetle{
    width:80%;
  }

  .from-btn{
    margin-left:100px;
    background-color: rgb(255, 255, 255);
    color: #ff08ea;
    border-color: #ff08ea;
    padding: 5px 15px;
    border-radius:5px;
  }

</style>
@section('title', 'Todo List')
@section('from')
  <form action="/add" method="post">
  @csrf
    <input class="from-tetle" type="text" cols="50" name="content" >
    <input class="from-btn" type="submit" value="追加">
  </form>
@endsection
@section('list')
  <table class="list">
    <tr class="list-frist">
      <th class="list-second">作成日</th>
      <th class="list-second">タスク名</th>
      <th class="list-second">更新</th>
      <th class="list-second">削除</th>
    </tr>
</table>
@endsection