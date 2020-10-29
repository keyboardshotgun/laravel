@extends('welcome')
@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <div class="container">
                <h1>글작성</h1>
                <form action="{{ route('articles.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label for="title">제목</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" />
                        {!!$errors->first('title' , '<span class="form-error">:message</span>')!!}
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <label for="content">본문</label>
                        <textarea name="content" id="content" rows="10" class="form-control">
                            {{ old('content') }}
                        </textarea>
                        {!!$errors->first('content' , '<span class="form-error">:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">저장하기</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
