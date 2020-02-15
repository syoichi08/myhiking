@extends('layouts.admin')
@section('title', 'トップページ')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Home</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                @guest
                @else
                <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                <a href="{{ action('Admin\NewsController@index_edit') }}" role="button" class="btn btn-primary">記録の編集</a>
                @endguest
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\NewsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">場所名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">場所</th>
                                <th width="50%">記録内容</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id}}</th>
                                    <td><a href="{{ action('Admin\NewsController@detail', ['id' => $news->id]) }}">{{ \Str::limit($news->title, 100) }}</a></td>
                                    <td>{{ \Str::limit($news->body, 250) }}</td>
                                    <td>
                                        <!--ログインの有無でボタンの非表示を切替-->
                                        <!--<div>-->
                                        <!--    @guest-->
                                        <!--    @else-->
                                        <!--    <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">編集</a>-->
                                        <!--    @endguest-->
                                        <!--</div>-->
                                        <!--ログインの有無でボタンの非表示を切替-->
                                        <!--<div>-->
                                        <!--    @guest-->
                                        <!--    @else-->
                                        <!--    <a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a>-->
                                        <!--    @endguest-->
                                        <!--</div>-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection