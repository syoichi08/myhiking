@extends('layouts.admin')

@section('content')
<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">パスワードの変更</div>
        <div class="card-body">
          <form method="POST" action="{{ action('Admin\UserController@password_update') }}">
            
            <div class="form-group">
              @if (session('change_password_error'))
                  {{session('change_password_error')}}
              @endif
                  
              @if (session('change_password_success'))
                  {{session('change_password_success')}}
              @endif
                  
              <label for="current">現在のパスワード</label>
              <input id="current" type="password" class="form-control" name="current-password" required autofocus>
              <label for="password">新しいパスワード</label>
              <input id="password" type="password" class="form-control" name="new-password" required>
            </div>
            
            <div class="form-group">
              @if ($errors->has('new-password'))
                <span class="help-block">
                <strong>{{ $errors->first('new-password') }}</strong>
                </span>
              @endif
              
              <label for="confirm">新しいパスワード（確認用）</label>
              <input id="confirm" type="password" class="form-control" name="new-password_confirmation" required>
             
              <button type="submit" class="user-btn">変更</button>
              {{ csrf_field() }}<!---リクエストの送信者が認証済みのユーザーであるか否かの確認-->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 