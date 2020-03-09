@extends('layouts.admin')

@section('content')
<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザー登録内容</div>
        <div class="card-body">
            <div class="form-group">
              <label for="name">
                名前
              </label>
              <div>
                <input class="form-control" value="{{ $user->name }}">
              </div>
            </div>
            <div class="form-group">
              <label for="email">
                email
              </label>
              <div>
                <input class="form-control" value="{{ $user->email }}">
              </div>
            </div>
              <a href="{{ action('Admin\UserController@edit') }}"><button class="user-btn">登録内容の編集</button></a>
              <a href="{{ action('Admin\UserController@password_edit') }}"><button class="user-btn">パスワードの編集</button></a>
              <a href="{{ action('Admin\UserController@softdelete') }}"><button class="user-btn">登録解除</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
