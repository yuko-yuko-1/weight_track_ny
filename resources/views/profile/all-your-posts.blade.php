@extends('layouts.app')

@section('title', 'All-Your-Posts')

@push('css')
<link rel="stylesheet" href="{{ asset('css/Profile/profile-allyour-posts.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="community-top">
    <h1>All Your Posts</h1>
</div>
<div class="container">
    <div class="home">
        <ul class="#">
            <a href="{{route('index')}}"><i class="fa-solid fa-house"></i></a>
            <a href="{{route('index')}}"><p>&ensp;Home&ensp;</p></a>
            <p>></p>
            <a href="{{route('profile-main')}}"><P>&ensp;Profile&ensp;</P></a>
            <p>></p>
            <a href="{{route('all-your-posts')}}"><p>&ensp;All Your Posts&ensp;</p></a>
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
            <button id="new-posts" class="new-posts"><i class="fa-solid fa-pen"></i>New Posts</button>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead class="table-header">
                <tr>
                    <th colspan="4" class="table-header">All your posts in community</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="post-image">
                        @if (isset($post_image))
                            <img src="{{ $post_image }}" alt="Post Image">
                        @else
                            <i class="fa-regular fa-image"></i>
                        @endif 
                    </td>
                    <td class="description">
                        <h4>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h4>
                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h6>
                        <div class="icon">
                            <i class="fa-regular fa-comment"><span>&ensp;14</span></i>
                            <i class="fa-regular fa-heart"><span>&ensp;24</span></i>
                            <p>Naoto &ensp;|</p><p> &ensp; 2024/4/19 &ensp;|</p><p>&ensp; Healthy Food</p>
                        </div>
                    </td>
                    <td>
                        <div class="actions">
                            <button class="edit" id="modalOpen"><i class="fa-solid fa-pen"></i></button>
                        </div>
                    </td>
                    <td>
                        <div class="actions">
                            <button class="delete"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- これ以降の要素は各投稿に関する情報であるため、テーブル内ではなく別の形式で記述する必要があります -->
    </div>
</div>
<script src="editmodal.js"></script>
@endsection
