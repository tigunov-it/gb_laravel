@extends('layouts.admin')

@section('header')
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    </div>
@endsection

@section('content')
     <div>
         <form method="post">
             <div class="form-group">
                 <label for="title">Наименование категории</label>
                 <input type="text" class="form-control" id="title" name="title" required>
             </div>
             <div class="form-group">
                 <label for="description">Описание</label>
                 <textarea class="form-control" name="description" id="description"></textarea>
             </div>
             <br>
             <button type="submit" class="btn btn-success" style="float: right">Сохранить</button>
         </form>
     </div>
@endsection
