@extends('layouts.admin')

@section('header')
    <h1 class="h2">Добавить запись</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <div>
        <form method="post" action="{{route('admin.news.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="author">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'Draft') selected @endif>Draft</option>
                    <option @if(old('status') === 'Active') selected @endif>Active</option>
                    <option @if(old('status') === 'Blocked') selected @endif>Blocked</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description"> {!! old('description') !!} </textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection
