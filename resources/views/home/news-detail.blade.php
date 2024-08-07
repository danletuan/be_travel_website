@extends('layouts.home-layout')

@section('title', 'News Detail')

@section('content')
<div class="title-new">
    <div class="title-content">
        <h1 class="text-start text-nowrap overflow-hidden text-truncate">{{ $news->title }}</h1>
        <div class="title-new-date">{{ $news->created_at->format('F d, Y') }}</div>
    </div>
</div>

<div class="content-new mt-5">
    <div class="container">
        <div class="row">
            <div class="col-8">
                {!! $news->content !!}
                @if($news->image)
                    <img src="{{ asset('be_travel_website/public/assets/home/news-detail/image1.png') }}" alt="{{ $news->title }}" class="img-fluid mb-3 mt-5">
                @endif
            </div>
            <div class="col-4">
                <div class="other-destinations">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Other Destinations</h4>
                        <a href="#" class="see-all">See all</a>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Wakatobi Beach Is A Paradise For Coral Reefs In Indonesia</h5>
                            <div class="card-text">Yogyakarta, Indonesia</div>
                            <a href="#" class="btn btn-success mt-5">View More</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Wakatobi Beach Is A Paradise For Coral Reefs In Indonesia</h5>
                            <div class="card-text">Yogyakarta, Indonesia</div>
                            <a href="#" class="btn btn-success mt-5">View More</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Wakatobi Beach Is A Paradise For Coral Reefs In Indonesia</h5>
                            <div class="card-text">Yogyakarta, Indonesia</div>
                            <a href="#" class="btn btn-success mt-5">View More</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Wakatobi Beach Is A Paradise For Coral Reefs In Indonesia</h5>
                            <div class="card-text">Yogyakarta, Indonesia</div>
                            <a href="#" class="btn btn-success mt-5">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('be_travel_website/public/css/home/news-detail.css') }}">
@endsection
