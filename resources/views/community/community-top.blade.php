@extends('layouts.app')

@section('title', 'Community')

@push('css')
<link rel="stylesheet" href="{{ asset('css/community-top.css')}}">
<link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>  
@endpush

@section('content')
<div class="community-top-bg">          
    <h1 class="community-top-title">COMMUNITY</h1>  
</div>
<div class="container-fluid community-main">
    <div class="row">
        <div class="col-4 mt-5 navcom">  
            {{-- <a href="{{ route('index')}}"><h5 class="user-location"><i class="fa-solid fa-house"></i>&ensp; Home &ensp;</h5></a>
            <a href="{{ route('community')}}"><h5 class="user-location">&ensp; COMMUNITY &ensp;</h5></a>
            <a href="#"><h5 class="user-location">&ensp; Healthy food &ensp;</h5></a>           --}}
        </div>
        <div class="col-4">
            <h2 class="all-community-title mt-5 mb-3">All Community</h2>
        </div>
        <div class="col-4 mt-5">
            <form action="{{ route('community.search') }}" method="get" class="py-3 ms-10">
                <div class="row community-search-form">
                    <div class="col-11 community-search-bar">
                        <input type="text" name="search" placeholder="search....." class="form-control">
                    </div>
                    <div class="col-1 border-0 magnifying-glass">
                        <button type="submit" class="btn btn-link">
                            <i class="fa-solid fa-magnifying-glass py-3"></i>
                        </button>
                    </div>               
                </div>               
            </form> 
        </div>
    </div>

    <div class="all-community">
        <div class="row">
            @forelse($all_communities as $community)
            <div class="col-lg-3 col-md-6 each-community">
                <a href="{{ route('community_all_posts', $community->id)}}">
                    <h3 class="community-categories mt-3 py-2">{{ $community->name }}</h3>
                
                    <img src="{{ asset('images/community/' . $community->image) }}" class="categories-images">
                </a> 
            </div>
            @empty     
                <p>No communities found.</p>
            @endforelse
        </div>
    </div>

    <div class="all-posts mt-5">
        <h2 class="all-posts-title">Search Results</h2>
        @if(isset($posts))
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No posts found.</p>
                @endforelse
            </div>
        @endif
    </div>
</div>
@endsection