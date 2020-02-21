<p>name; {{ $user->name }}</p>
<p>email; {{ $user->email }}</p>
<a href="{{ action('Admin\UserController@edit') }}"><button>ユーザー登録内容の編集</button></a>
<a href="{{ action('Admin\UserController@password_edit') }}"><button>パスワードの編集</button></a>