@extends('layouts.admin')

@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{route('admin.categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered">

            <thead>
            <tr>
                <th>Id</th>
                <th>Количество новостей</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->news->count() }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category'=>$category])  }}"> Edit. </a> |
                        <a href="#" style="color: red">Del</a></td>
                </tr>

            @empty
                <tr> <td colspan="6">Записей нет</td> </tr>
            @endforelse
            </tbody>

        </table>
        {{ $categories->links()  }}
    </div>
@endsection
