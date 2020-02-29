@extends('layouts.admin')
@section('title', 'トップページ')

@section('content')
    <div class="top-wrap">
        <!--<div class="link">-->
        <!--    @guest-->
        <!--    @else-->
        <!--    <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-secondary">新規作成</a>-->
        <!--    <a href="{{ action('Admin\NewsController@index_edit') }}" role="button" class="btn btn-secondary">記録の編集</a>-->
        <!--    <a href="{{ action('Admin\UserController@index') }}" role="button" class="btn btn-secondary">アカウントの変更</a>-->
        <!--    @endguest-->
        <!--</div>-->
        
        <div id="sample">
            <form action="{{ action('Admin\NewsController@index') }}" method="get">
            <input type="text" class="text" name="cond_title" value="{{ $cond_title }}" placeholder="場所名を入力">
            <input type="submit" class="btn btn-secondary" value="検索">
            <p style="clear:both;"></p>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
        
    @foreach($posts as $news)
    <section>
        <div class="title">
            <!--場所名-->
            <p><a href="{{ action('Admin\NewsController@detail', ['id' => $news->id]) }}">
            {{ \Str::limit($news->title, 100) }}</a></p>
        </div>
    <div class="content">
        <div class=left-body>
            <div class="img">
                <!--画像-->
                @if ($news->image_path)
                    <img src="{{ asset('storage/image/' . $news->image_path) }}">
                @endif
            </div>
        </div>   
            
        <div class="right-body">
                <div class="time">
                    <!--日時-->
                    <p>{{ $news->day }}</p>
                </div>
                
                <div class="review">
                    <!--星評価-->
                    満足度 {{ config('score')[$news->review] }}
                </div>
                
                <div class="desk">
                    <!--本文-->
                    <p>{{ \Str::limit($news->body, 250) }}</p>
                </div>
        </div>
    </div>
    </section>
    @endforeach

@endsection
