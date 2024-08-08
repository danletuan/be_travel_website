@extends('layouts.home-layout')

@section('title', 'News')

@section('content')
<div class="our-news-header">
    <h1 class="text-start">Our News</h1>
</div>

<div class="container">
    <header class="text-center my-4">
        <h1>Travelaja Articles</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam</p>
    </header>

    <nav class="nav justify-content-center mb-4">
        @foreach($categories as $cat)
            <a class="nav-link {{ request('category') == $cat->name ? 'active' : '' }}" href="{{ route('news.index', ['category' => $cat->name]) }}">{{ $cat->name }}</a>
        @endforeach
    </nav>

    <div class="row">
        @foreach($news as $item)
        <div class="col-md-4 mb-4">
            <a href="{{ route('news.show', ['slug' => $item->slug]) }}" class="card-link">
                <div class="card">
                    <img src="{{ $item->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $item->created_at->format('F d, Y') }}</small></p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="css/home/news.css">
@endsection
