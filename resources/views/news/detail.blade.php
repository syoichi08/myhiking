@extends('layouts.admin')
@section('title', 'ハイキング記録')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <p>{{ $news_form->title }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                           満足度 {{ config('score')[$news_form->review] }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <p>{{ $news_form->day }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <p>{{ $news_form->area }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        @if ($news_form->image_path)
                            <img src="{{ $news_form->image_path }}">
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <p>{{ $news_form->body }}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection