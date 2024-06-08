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
    <h1>HEALTHY FOOD</h1>
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
            <ul class="col-1 user-img mt-3">
                <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-sm"></i>
            </ul>
            <ul class="col-3 user mt-4">
                <p class="user-name">User Name</p>
                <p class="posteddate">2024/04/15</p>
            </ul>
            <ul class="col-6">

            </ul>
            <ul class="col-2 mt-4">
                <button class="button edit edit-modal-btn" data-bs-toggle="modal" data-bs-target="#edit-post" id="modalOpen" ><i class="fa-solid fa-pen"></i></button>
                <button class="delete" data-bs-toggle="modal" data-bs-target="#delete" id="modalOpen" ><i class="fa-solid fa-trash-can"></i></i></button>
            </ul>
        </div>
        <div class="container col-10">
            <ul>
                <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo esse inventore maiores. Tempore sed, eligendi nisi earum dolorum deleniti non.</h3>
            </ul>
            <ul>
                <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non quibusdam perferendis totam expedita, repellat, similique earum eos nisi quo unde excepturi repellendus, sapiente vel veritatis perspiciatis accusantium illum et explicabo hic nostrum asperiores placeat! Natus molestias nulla nobis sint, illo obcaecati quaerat distinctio autem. Totam distinctio adipisci ipsum itaque obcaecati, minus impedit laborum voluptatibus numquam odit asperiores sed vero cum labore saepe eveniet voluptas illo facere? Accusantium doloribus maxime earum ab quo quia, tempore ex distinctio ea fugiat aut sunt doloremque sint at officia unde blanditiis laborum vero sequi. Vel, praesentium. Asperiores accusantium hic dolor earum qui alias repudiandae dolorem.</h6>
            </ul>
            <div class="text-center">
                <img src="{{asset('images/show-post-apple.jpeg')}}" alt="show_post" style="width: 500px; height: 600px; object-fit: cover;">
            </div>
            <div class="post-bottom mt-4">
                <i class="fa-regular fa-heart"><span>&ensp;24</span></i>
                <i class="fa-solid fa-share"></i>
            </div>
            <div class="comment-modal text-center mb-4">
                <button class="button add-comment-btn" data-bs-toggle="modal" data-bs-target="#add-comment" id="modalOpen"><i class="fa-solid fa-pen"></i><span>Add your comment</span></button>
            </div>
            @include('community.post.contents.comments.modals.add-comment')
        </div>

    </div>

    {{-- Comments --}}

    <div class="comments">
        <p class="mt-3">20 comments</p>
        <div class="card mt-2 mb-3">
            <div class="row post-top mt-4">
                <ul class="col-1 user-img">
                    <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-sm"></i>
                </ul>
                <ul class="col-3 user mt-2">
                    <p class="user-name">User Name</p>
                    <p class="posteddate">2024/04/15</p>
                </ul>
            </div>
            <div class="col-10 comment-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro officiis et similique atque recusandae sapiente maiores dicta assumenda quisquam, nesciunt nobis necessitatibus deleniti quo odit fuga nostrum est quidem alias?</p>
            </div>
        </div>

        <div class="card">
            <div class="row post-top mt-4">
                <ul class="col-3">
                    <i class="fa-solid fa-circle-user text-secondary icon-sm user-1"></i>
                </ul>
                <ul class="col-2 users mt-3">
                    <p class="your-name">User Name</p>
                    <p class="your-posteddate">2024/04/15</p>
                </ul>
                <ul class="col-4"></ul>
                <ul class="col-3 post-bottom1">
                    <button class="button edit edit-modal-btn" data-bs-toggle="modal" data-bs-target="#edit-comment" id="modalOpen" ><i class="fa-solid fa-pen pen-1"></i></button>
                    <button class="delete" data-bs-toggle="modal" data-bs-target="#delete" id="modalOpen" ><i class="fa-solid fa-trash-can trash-1"></i></i></button>
                </ul>
            </div>
            @include('community.post.contents.comments.modals.edit-comment')
            <div class="col-10 comment-content w-95">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia odio cum odit delectus aliquam, quas voluptate non libero culpa similique quos tenetur maxime nam minus beatae aperiam distinctio saepe nobis?</p>
            </div>
            @include('community.post.contents.comments.modals.delete-comment')

        </div>
    </div>
</div>





@endsection
