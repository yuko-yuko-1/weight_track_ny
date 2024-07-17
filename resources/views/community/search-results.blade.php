@extends('layouts.app')

@section('title', 'Search Results')

@push('css')
<link rel="stylesheet" href="{{ asset('css/community-all-posts.css')}}">
<link rel="stylesheet" href="{{ asset('css/community-top.css')}}">
{{-- <link rel="stylesheet" href="{{ asset('css/show-post.css')}}"> --}}
<link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>  
@endpush

@section('content')
<div class="community-top-bg">          
    <h1 class="community-top-title">COMMUNITY</h1>  
</div>


<div class="container-fluid community-main">
    <div class="row">
        <div class="col-3">
           
        </div>
        <div class="col-4">
            <h4 class="mt-5 ms-1">Search Results</h4>
        </div>
        <div class="col-4 mt-5">
            <form action="{{ route('community.search') }}" method="get" class="py-3 me-5">
                @csrf
                <div class="row community-search-form">
                    <div class="col-11 community-search-bar">
                        <input type="text" name="search" value="{{ $search }}" placeholder="search....." class="form-control h1">
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
</div>


<div class="container">
    <div class="card mt-2 mb-4">
        <h2>Post containing "{{ $search }}"</h2>
                
        @forelse($posts as $post)
            <div class="row mb-2">
                <div class="col-1 my-auto">
                    <a href="{{ route('post.show', $post->id)}}">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="d-block text-center icon-md ps-2 mx-auto my-auto">
                    </a>
                </div>
                <div class="col-1">
                    @if($post->user->avatar)
                        <img src="{{ asset('images/Profile/' . $post->user->avatar) }}" alt="{{ $post->user->username }}" class="d-block text-center icon-sm rounded-circle ms-auto mt-2">
                        @else
                        <i class="fa-solid fa-circle-user text-secondary d-block icon-sm"></i>
                    @endif
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                    <div class="col">
                                        <h3 class="float-start">
                                            <a href="{{ route('post.show', $post->id)}}" class="text-decoration-none" style="color: #A8D2A2;">{{ $post->title }}</a>
                                        </h3>
                                        @if (Auth::user()->id === $post->user->id)
                                            <div class="float-end">
                                                {{-- EDIT BUTTON --}}
                                                <button class="button edit edit-modal-btn" data-bs-toggle="modal" data-bs-target="#edit-post{{ $post->id }}" id="modalOpen" ><i class="fa-solid fa-pen"></i></button>
                                                {{-- DELETE BUTTON --}}
                                                <button class="delete" data-bs-toggle="modal" data-bs-target="#delete-post{{ $post->id }}" id="modalOpen" ><i class="fa-solid fa-trash-can"></i></i></button>   
                                            </div>
                                            @include('posts.contents.modals.edit')
                                            @include('posts.contents.modals.delete')
                                        @endif
                                    </div>
                                {{-- </div> --}}
                                <div class="row">
                                    <div class="col">
                                        <h6>{{ $post->content }}</h6>
                                        <div>
                                            <span><i class="fa-regular fa-comment me-0"></i>{{ $post->comments->count() }}</span>
                                            <span><i class="fa-solid fa-heart me-0"></i>{{$post->likes->count() }}</span>
                                            &ensp;
                                            &ensp;
                                            <span>{{ $post->user->username }}</span>
                                            &ensp;|&ensp;
                                            <span>{{ $post->created_at }}</span>
                                            &ensp;|&ensp;
                                            <span>{{ $post->community->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">            
                
        @empty     
            <p class="ms-4">No posts found.</p>
        @endforelse
        {{-- {{ $posts->appends(['search' => $search])->links() }} --}}
    </div>
</div>

@endsection