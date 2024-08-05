@extends('layouts.home-layout')

@section('title', 'News Detail')

@section('content')
<div class="title-new">
    <div class="title-content">
        <h1 class="text-start text-nowrap overflow-hidden text-truncate">{{ $news->title }}</h1>
        <div class="title-new-date">{{ $news->created_at->format('F j, Y') }}</div>
    </div>
</div>

<div class="content-new mt-5">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <p style="text-indent: 30px;">{{ $news->content }}</p>
                <!-- Thêm phần tử hình ảnh nếu cần thiết -->
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" class="img-fluid mb-3 mt-5">
                @endif
            </div>
            <div class="col-4">
                <div class="other-destinations">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Other Destinations</h4>
                        <a href="#" class="see-all">See all</a>
                    </div>
                    <!-- Các bài viết khác có thể được liệt kê ở đây -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="css/home/news-detail.css">
@endsection
