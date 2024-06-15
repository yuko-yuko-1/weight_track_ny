<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

@extends('layouts.app')

@section('title', 'Showing Post')

@push('css')
<link rel="stylesheet" href="{{ asset('css/show-post.css')}}">
@endpush

@section('content')
<div class="community-top">
    <h1 class="text-uppercase">{{$post->community->name}}</h1>
</div>

<div class="container">
    {{-- <div class="home">
        <ul class="#">
            <a href="{{route('index')}}"><i class="fa-solid fa-house"></i></a>
            <a href="{{route('index')}}"><p>&ensp;Home&ensp;</p></a>
            <p>></p>
            <a href="{{route('index')}}"><P>&ensp;Community&ensp;</P></a>
            <p>></p>
            <a href="{{route('index')}}"><p>&ensp;Healthy Food&ensp;</p></a>
        </ul>
    </div> --}}

    <div class="card mt-3">
        <div class="row post-top">
            <ul class="col-1 user-img mt-3 mx-auto mt-auto">
                @if($post->user->avatar)
                    <img src="{{ asset('images/Profile/' . $post->user->avatar) }}" alt="{{ $post->user->username }}" class="d-block text-center icon-md rounded-circle">
                @else
                    <i class="fa-solid fa-circle-user text-secondary d-block"></i>
                @endif
            </ul>
            <ul class="col-4 user mt-4 text-start">
                <p class="user-name">{{ $post->user->username}}</p>
                <p class="posteddate">{{ $post->created_at}}</p>
            </ul>
            <ul class="col-5">

            </ul>
            @if (Auth::user()->id === $post->user->id)
                <ul class="col-2 mt-4">
                    <button class="button edit edit-modal-btn" data-bs-toggle="modal" data-bs-target="#edit-post{{ $post->id }}" id="modalOpen" ><i class="fa-solid fa-pen"></i></button>
                    <button class="delete" data-bs-toggle="modal" data-bs-target="#delete-post{{ $post->id }}" id="modalOpen" ><i class="fa-solid fa-trash-can"></i></i></button>
                </ul>
                {{-- include --}}
                @include('posts.contents.modals.edit')
                @include('posts.contents.modals.delete')
            @else
                <ul class="col-2">

                </ul>
            @endif
        </div>
        <div class="container col-10">
            <ul>
                <h3>{{ $post->title}}</h3>
            </ul>
            <ul>
                <h6>{{ $post->content }}</h6>
            </ul>
            <div class="text-center">
                <img src="{{ $post->image }}" alt="show_post" style="width: 500px; height: 600px; object-fit: cover;">
            </div>

            <div class="post-bottom mt-4 d-flex align-items-center">
                <div class="col-auto d-flex align-items-center me-3">
                    {{-- heart button --}}
                    @if ($post->isLiked())
                         <form action="{{route('like.delete', $post->id)}}" method="post">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn shadow-none icon-sm mt-3" >
                             <i class="fa-solid fa-heart text-danger"></i>
                         </button>
                         </form>

                    @else
                         <form action="{{route('like.store', $post->id)}}" method="post">
                         @csrf
                         <button type="submit" class="btn shadow-none icon-sm mt-3">
                          <i class="fa-regular fa-heart"></i>
                         </button>
                         </form>
                    @endif
                    <div class="col-auto heart-count px-0">
                        {{-- counter --}}
                        {{$post->likes->count()}}
                    </div>
                </div>
                {{-- <i class="fa-solid fa-share"></i> --}}
            </div>
            <div class="comment-modal text-center mb-4">
                <button class="button add-comment-btn" data-bs-toggle="modal" data-bs-target="#add-comment" id="modalOpen"><i class="fa-solid fa-pen"></i><span>Add your comment</span></button>
            </div>
            @include('community.post.contents.comments.modals.add-comment')
        </div>

    </div>

    {{-- Comments --}}

    <div class="comments">
        <p class="mt-3">{{ $post->comments->count()}} comments</p>
        @foreach($post->comments as $comment )
        <div class="card posted-comments mt-3 mb-3">
            <div class="row post-top mt-4 ">
                    <div class="row comment-item mb-3">
                        <div class="col-2 user-img2">
                            @if ($comment->user->avatar)
                                <img src="{{asset('images/Profile/' . $comment->user->avatar) }}" alt="{{$comment->user->username}}" class="d-block text-center icon-md rounded-circle">

                            @else
                                <i class="fa-solid fa-circle-user text-secondary icon-sm user-1"></i>
                            @endif
                        </div>
                        <div class="col-6 users mt-3">
                            <p class="your-name">{{$comment->user->username}}</p>
                            <p class="your-posteddate">{{$comment->created_at}}</p>
                        </div>
                        <div class="col-1"></div>

                    @if (Auth::user()->id === $comment->user->id)
                        <div class="col-3 post-bottom1">
                           <button class="button edit edit-modal-btn" data-bs-toggle="modal" data-bs-target="#edit-comment-{{$comment->id}}" id="modalOpen" ><i class="fa-solid fa-pen pen-1"></i></button>
                           <button class="delete" data-bs-toggle="modal" data-bs-target="#delete-comment-{{$comment->id}}" id="modalOpen" ><i class="fa-solid fa-trash-can trash-1"></i></i></button>
                        </div>
                        @include('community.post.contents.comments.modals.edit-comment')
                    @else
                        <div class="col-3"></div>
                    @endif
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10 comment-content w-95">
                            <p>{{$comment->comment_content}}</p>
                        </div>
                    </div>
                </div>
                    @include('community.post.contents.comments.modals.delete-comment')

            </div>
        @endforeach
    </div>
</div>
@endsection
