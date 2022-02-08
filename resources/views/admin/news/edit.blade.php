@extends('layouts.admin')

@section('header')
    <h1 class="h2">Редактировать запись</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
@endsection

@section('content')
    <div>
        @include('inc.message')
        <form method="post" action="{{route('admin.news.update', ['news' => $news])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" id="category_id" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        @if($category->id === $news->category_id) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id') <strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                @error('title') <strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
                @error('author') <strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'Draft') selected @endif>Draft</option>
                    <option @if($news->status === 'Active') selected @endif>Active</option>
                    <option @if($news->status === 'Blocked') selected @endif>Blocked</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description"
                          id="description"> {!! $news->description !!} </textarea>
                @error('description') <strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
