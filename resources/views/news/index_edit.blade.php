@extends('layouts.admin')
@section('title', 'マイページ')

@section('content')
    <div class="container">
            <div id="sample">
                <form action="{{ action('Admin\NewsController@index_edit') }}" method="get">
                    <input type="text" class="text" name="cond_title" value="{{ $cond_title }}" placeholder="場所名を入力">
                    <input type="submit" class="btn btn-secondary" value="検索">
                    <p style="clear:both;"></p>
                    {{ csrf_field() }}
                </form>
            </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-white">
                        <thead>
                            <tr>
                                <th width="10%">タイトル</th>
                                <th width="20%">場所</th>
                                <th width="50%">記録内容</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <td>{{ \Str::limit($news->title, 100) }}</td>
                                    <th>{{ $news->area}}</th>
                                    <td>{{ \Str::limit($news->body, 250) }}</td>
                                    <td>
                                        <!--ログインの有無でボタンの非表示を切替-->
                                        <div>
                                            <!--@guest-->
                                            <!--@else-->
                                            <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">編集</a>
                                            <!--@endguest-->
                                        </div>
                                        <!--ログインの有無でボタンの非表示を切替-->
                                        <div>
                                            <!--@guest-->
                                            <!--@else-->
                                            <a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a>
                                            <!--@endguest-->
                                        </div>
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