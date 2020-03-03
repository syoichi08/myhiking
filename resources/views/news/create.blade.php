@extends('layouts.admin')
@section('title', 'ハイキング記録の作成')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row box">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">場所<span class="required">必須</span></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">都道府県<span class="required">必須</span></label>
                        <div class="col-md-10">
                        <select type="text" class="form-control" name="area" value="{{ old('area') }}">
                            @foreach(config('pref') as $key => $score)
                               <option value="{{ $score }}">{{ $score }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">日時</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="day" value="{{ old('day') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">記録内容<span class="required">必須</span></label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">満足度<span class="required">必須</span></label>
                        <div class="col-md-10">
                        <select type="text" class="form-control" name="review" value="{{ old('review') }}">
                            @foreach(config('score') as $key => $score)
                               <option value="{{ $key }}">{{ $score }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-secondary" value="作成">
                </form>
            </div>
        </div>
    </div>
@endsection