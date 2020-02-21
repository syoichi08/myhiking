
<form method="POST" action="{{ action('Admin\UserController@password_update') }}">
  @if (session('change_password_error'))
    {{session('change_password_error')}}
  @endif
  
  @if (session('change_password_success'))
    {{session('change_password_success')}}
  @endif
  
  <label for="current">現在のパスワード</label></br>
    <input id="current" type="password" class="form-control" name="current-password" required autofocus></br></br>
  <label for="password">新しいパスワード</label></br>
    <input id="password" type="password" class="form-control" name="new-password" required></br></br>
  
  @if ($errors->has('new-password'))
    <span class="help-block">
    <strong>{{ $errors->first('new-password') }}</strong>
    </span>
  @endif
              
  <label for="confirm">新しいパスワード（確認用）</label></br>
    <input id="confirm" type="password" class="form-control" name="new-password_confirmation" required></br></br>
  <button type="submit" class="btn btn-primary">変更</button></br>
    {{ csrf_field() }}<!---リクエストの送信者が認証済みのユーザーであるか否かの確認-->
</form>
        
      