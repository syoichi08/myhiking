<form method="POST" action="{{ action('Admin\UserController@update') }}">
  <label for="name">name</label></br>
    <input type="text" name="name" value="{{ $user->name }}"></br></br>
  <label for="email">email</label></br>
    <input type="text" name="email" value="{{ $user->email }}"></br></br>
  <button type="submit" class="btn btn-primary">変更</button></br>
 {{ csrf_field() }}
</form>
