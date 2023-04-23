@extends('todo.default')

@section('title')
    <div class="login">
        <p class="todo-title">タスク検索<p>
        @if (Auth::check())
        <div class="login-name">「{{ $user->name }}」でログイン中</div>
        @else
        <div>ログインしてください。（<a href="/login">ログイン</a>
        <a href="/register">登録</a>）</div>
        @endif
        <div>
        <form action="/logout" method="post">
             @csrf
            <input type="hidden" name="logout" value="">
            <input class="from-btn_login" type="submit" value="ログアウト">
        </form>
        </div>
        </div>
    </div>
@endsection

@section('from')
    @error('title')
        <div>{{ $message }}</div>
    @enderror
    <form action="/search" method="get" class="from">
        @csrf
        <input class="top-from-tetle" type="text" cols="20" name="keyword">
        <select name="tag_id" class="top-from-tag">
            <option disabled selected value></option>
            <option value="1">家事</option>
            <option value="2">勉強</option>
            <option value="3">運動</option>
            <option value="4">食事</option>
            <option value="5">移動</option>
        </select>
        <input class="from-btn_add" type="submit" value="検索">
    </form>
@endsection

@section('list')
    <div class="list">
        <table class="list-frist">
            <tr class="list-second">
                <th class="list-third">作成日</th>
                <th class="list-four">タスク名</th>
                <th class="list-seven">タグ</th>
                <th class="list-five">更新</th>
                <th class="list-six">削除</th>
            </tr>
            @foreach ($todos as $todo)
                <tr class="list-todo">
                    <form action="/edit" method="post">
                        <td class="todo-create">{{ $todo->created_at }}</td>
                        <td><input type="text" class="todo-upd" value="{{ $todo->title }}" name="title"></td>
                        <td>
                            <select name="tag_id" class="todo-tag">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" @if ($tag->id === $todo->tag->id) selected @endif>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                        </td>
                        <td>
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input class="from-btn_upd" type="submit" value="更新">
                        </td>
                    </form>
                    <td>
                        <form action="/del" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <input class="from-btn_del" type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <p>
        <form action="/" method="get">
            <input type="hidden" name="id" value="">
            <input class="from-btn_return" type="submit" value="戻る">
        </form>
        </p>
    </div>
@endsection
