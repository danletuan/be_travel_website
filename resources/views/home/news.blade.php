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
        <a class="nav-link {{ request('category') == 'Adventure Travel' ? 'active' : '' }}" href="{{ route('news.index', ['category' => 'Adventure Travel']) }}">Adventure Travel</a>
        <a class="nav-link {{ request('category') == 'Beach' ? 'active' : '' }}" href="{{ route('news.index', ['category' => 'Beach']) }}">Beach</a>
        <a class="nav-link {{ request('category') == 'Explore World' ? 'active' : '' }}" href="{{ route('news.index', ['category' => 'Explore World']) }}">Explore World</a>
        <a class="nav-link {{ request('category') == 'Family Holidays' ? 'active' : '' }}" href="{{ route('news.index', ['category' => 'Family Holidays']) }}">Family Holidays</a>
        <a class="nav-link {{ request('category') == 'Art and Culture' ? 'active' : '' }}" href="{{ route('news.index', ['category' => 'Art and Culture']) }}">Art and Culture</a>
    </nav>

    <div class="row">
        @foreach($news as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $item->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text"><small class="text-muted">{{ $item->created_at->format('F d, Y') }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


@section('styles')
    <link rel="stylesheet" href="css/home/news.css">
@endsection
