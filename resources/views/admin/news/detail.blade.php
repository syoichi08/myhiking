@extends('layouts.admin')
@section('title', 'ハイキング記録の詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ハイキング記録の詳細</h2>
                <!--<form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-data">-->
                <!--    @if (count($errors) > 0)-->
                <!--        <ul>-->
                <!--            @foreach($errors->all() as $e)-->
                <!--                <li>{{ $e }}</li>-->
                <!--            @endforeach-->
                <!--        </ul>-->
                <!--    @endif-->
                    <div class="form-group row">
                        <label class="col-md-2" for="title">場所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $news_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">都道府県</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="area" value="{{ $news_form->area }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">日時</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="day" value="{{ $news_form->day }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">記録内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $news_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">評価</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="review" value="{{ $news_form->review }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <!--<div class="col-md-10">-->
                        <!--    <input type="file" class="form-control-file" name="image">-->
                        <!--    <div class="form-text text-info">-->
                        <!--        設定中: {{ $news_form->image_path }}-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        @if ($news_form->image_path)
                                    <img src="{{ asset('storage/image/' . $news_form->image_path) }}">
                        @endif
                        
                    </div>
                    <div class="form-group row">
                    </div>
                <!--</form>-->
            </div>
        </div>
    </div>
@endsection