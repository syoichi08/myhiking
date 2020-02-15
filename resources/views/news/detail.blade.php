@extends('layouts.admin')
@section('title', 'ハイキング記録の詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ハイキング記録の詳細</h2>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">場所</label>
                        <div class="col-md-10">
                            <p>{{ $news_form->title }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">都道府県</label>
                        <div class="col-md-10">
                            <p>{{ $news_form->area }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">日時</label>
                        <div class="col-md-10">
                            <p>{{ $news_form->day }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">記録内容</label>
                        <div class="col-md-10">
                            <p>{{ $news_form->body }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">評価</label>
                        <div class="col-md-10">
                           {{ config('score')[$news_form->review] }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        @if ($news_form->image_path)
                                    <img src="{{ asset('storage/image/' . $news_form->image_path) }}">
                        @endif
                    </div>
                    <div class="form-group row">
                    </div>
            </div>
        </div>
    </div>
@endsection