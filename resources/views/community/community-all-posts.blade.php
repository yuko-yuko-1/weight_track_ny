<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('css/community-all-posts.css')}}">
@endpush

@section('content')
<div class="community-top">
    <h1>HEALTHY FOOD</h1>
</div>

<div class="container">
    <div class="home">
        <ul class="#">
            <a href="{{route('index')}}"><i class="fa-solid fa-house"></i></a>
            <a href="{{route('index')}}"><p>&ensp;Home&ensp;</p></a>
            <p>></p>
            <a href="{{route('index')}}"><P>&ensp;Community&ensp;</P></a>
            <p>></p>
            <a href="{{route('index')}}"><p>&ensp;Healthy Food&ensp;</p></a>
        </ul>
    </div>

    <div class="row mb-3 mt-2">
        <div class="col-6">
            <div class="search-bar">
                <input class="search-input" type="search" id="search-input" placeholder="Search...">
                <button class="search-btn" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="posts col-6">
            <button id="new-posts" class="new-posts" data-bs-toggle="modal" data-bs-target="#create-new-posts" id="modalOpen" ><i class="fa-solid fa-pen"></i>New Posts</button>
        </div>
        @include('community.modals.create-new-posts')
    </div>



    <div class="container">
        <div class="card">
            <h2>All posts</h2>

            <div class="row">
              <ul class="col-1 post-image">
               <i class="fa-regular fa-image text-secondary d-block text-center icon-md"></i>
              </ul>

              <ul class="col-1">
                <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-sm"></i>
              </ul>
              <ul class="col-10 title">
              <div class="row">
                    <div class="d-flex justify-content-between align-items-center post">
                        <h3 >
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo esse inventore maiores. Tempore sed, eligendi nisi earum dolorum deleniti non.
                        </h3>
                        <div class="ml-auto">
                            <button class="button edit edit-modal-btn" data-bs-toggle="modal" data-bs-target="#edit-post" id="modalOpen" ><i class="fa-solid fa-pen"></i></button>
                        </div>
                        @include('community.modals.edit')
                        <div class="ml-auto">
                            <button class="delete" data-bs-toggle="modal" data-bs-target="#delete" id="modalOpen" ><i class="fa-solid fa-trash-can"></i></i></button>
                        </div>
                        @include('community.modals.delete')
                    </div>
                </div>
                </ul>

            <ul class="col-10">
                <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non quibusdam perferendis totam expedita, repellat, similique earum eos nisi quo unde excepturi repellendus, sapiente vel veritatis perspiciatis accusantium illum et explicabo hic nostrum asperiores placeat! Natus molestias nulla nobis sint, illo obcaecati quaerat distinctio autem. Totam distinctio adipisci ipsum itaque obcaecati, minus impedit laborum voluptatibus numquam odit asperiores sed vero cum labore saepe eveniet voluptas illo facere? Accusantium doloribus maxime earum ab quo quia, tempore ex distinctio ea fugiat aut sunt doloremque sint at officia unde blanditiis laborum vero sequi. Vel, praesentium. Asperiores accusantium hic dolor earum qui alias repudiandae dolorem.</h6>
            </ul>
            <div class="row">
                <ul class="post-bottom col-10">
                    <i class="fa-regular fa-comment"><p>&ensp;14</p></i>

                            {{-- count --}}
                            <i class="fa-regular fa-heart"><p>&ensp;24</p></i>
                            {{-- count --}}

                            <p>Naoto &ensp;|</p><p> &ensp; 2024/4/19 &ensp;|</p><p>&ensp; Healthy Food</p>
                </ul>
            </div>
        </div>

    </div>
</div>





@endsection
