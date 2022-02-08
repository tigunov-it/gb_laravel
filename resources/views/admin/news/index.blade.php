@extends('layouts.admin')

@section('header')
            <h1 class="h2">Список новостей</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{route('admin.news.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
               </div>
            </div>
@endsection

@section('content')
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-bordered">

            <thead>
            <tr>
                <th>Id</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Статус</th>
                <th>Описание</th>
                <th>Автор</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ optional($news->category)->title }}</td> // Добавляем optional - если связи не будет, чтобы не сломалась страница
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->description }}</td>
                    <td>{{ $news->author }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news'=>$news->id])  }}"> Edit. </a> |
                        <a href="#" style="color: red">Del</a></td>
                </tr>

            @empty
                <tr> <td colspan="6">Записей нет</td> </tr>
            @endforelse
            </tbody>

        </table>
        {{ $newsList->links()  }}
    </div>
@endsection

