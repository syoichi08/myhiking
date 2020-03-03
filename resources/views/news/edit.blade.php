@extends('layouts.admin')
@section('title', 'ハイキング記録の編集')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">場所<span class="required">必須</span></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $news_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">都道府県<span class="required">必須</span></label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="area" value="{{ $news_form->area }}">
                            @foreach(config('pref') as $key => $score)
                               <option value="{{ $score }}">{{ $score }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">日時</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="day" value="{{ $news_form->day }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">記録内容<span class="required">必須</span></label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $news_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">満足度<span class="required">必須</span></label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="review" value="{{ $news_form->review }}">
                            @foreach(config('score') as $key => $score)
                               <option value="{{ $key }}">{{ $score }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <!--<div class="form-text text-info">-->
                            <!--    設定中: {{ $news_form->image_path }}-->
                            <!--</div>-->
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $news_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-secondary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection