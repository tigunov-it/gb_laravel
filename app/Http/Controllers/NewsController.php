<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::query()->get(); // Выбираем все поля. Через select([имена полей]) можно выбрать конкретные поля

        return view('news.index', [
            'newsList' => $news
        ]);
    }

// !! не работает - страницу открывает, а саму новость не выводит. В чем ошибка?
//    public function show(News $news) {
//
//        return view('news.show', [
//            'news' => $news
//        ]);
//    }

    public function show(int $id)
    {
        $news = News::findOrFail($id);

        return view('news.show', [
            'news' => $news
        ]);
    }
}
