<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('css/community-all-posts.css')}}">
@endpush

@section('content')
<div class="community-top">
    <a href="{{ route('community_all_posts', $community->id)}}" class="text-decoration-none">
        <h1 class="text-uppercase">{{ $community->name }}</h1>
    </a>
</div>

<div class="container">
    <div class="home">
        <ul class="#">
            {{-- <a href="{{route('index')}}"><i class="fa-solid fa-house"></i></a>
            <a href="{{route('index')}}"><p>&ensp;Home&ensp;</p></a>
            <p>></p>
            <a href="{{route('index')}}"><P>&ensp;Community&ensp;</P></a>
            <p>></p>
            <a href="{{route('index')}}"><p>&ensp;Healthy Food&ensp;</p></a> --}}
        </ul>
    </div>

    <div class="row mb-3 mt-2">
        <div class="col-6">
            <form action="{{ route('community.post.search', $community->id) }}" method="get">
                <div class="search-bar">
                    <input class="search-input" type="text" name="search" id="search-input" placeholder="Search...">
                    <button type="submit" class="search-btn" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        <div class="posts col-6">
            <button id="new-posts" class="new-posts" data-bs-toggle="modal" data-bs-target="#create-new-posts-{{ $community->id }}" id="modalOpen" ><i class="fa-solid fa-pen"></i>New Posts</button>
        </div>
        {{-- $communityという変数をcommunityという名前で現在のテンプレートからcreate-new-postsテンプレートにデータを渡す。 --}}
        @include('posts.contents.modals.create-new-posts', ['community' => $community])
    </div>
</div>
    <div class="container">
        <div class="card mt-2 mb-4">
            <h2>All posts in "{{ $community->name }}" Community</h2>
                @forelse($all_posts as $post)  
                    <div class="row mb-2">
                        <div class="col-1 my-auto">
                            <a href="{{ route('post.show', $post->id)}}">
                                <img src="{{ $post->image }}" class="d-block text-center icon-md ps-2 mx-auto my-auto">
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
                                    </div>
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
                    <hr class="my-0">            
                    
                @empty     
                    <p class="ms-4">No posts found.</p>
                @endforelse

              </div> 
                        
                </div>             
          </div>
        </div>
    </div>

@endsection