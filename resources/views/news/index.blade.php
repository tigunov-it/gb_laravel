@extends('layouts.main')

@section('header')

    <div class="row py-lg-2">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Главные новости</h1>
        </div>
    </div>

@endsection


@section('content')

    @if(empty($news))
        <h3>Новостей нет</h3>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($news as $newsItem)

                <div class="card-group">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                             preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <div class="card-header">
                                <strong> <a
                                        href="{{ route('news.show', ['id' => $newsItem['id']]) }} "> {{ $newsItem['title'] }} </a>
                                </strong>
                            </div>
                            <p class="card-text">{{ $newsItem['description'] }}</p>
                        </div>
                        <div class="card-footer">Author: {{ $newsItem['author'] }}
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    @endif

@endsection

