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
            <a href="{{ route('index')}}"><h5 class="user-location"><i class="fa-solid fa-house"></i>&ensp; Home &ensp;</h5></a>
            <a href="#"><h5 class="user-location">&ensp; COMMUNITY &ensp;</h5></a>
            <a href="#"><h5 class="user-location">&ensp; Healthy food &ensp;</h5></a>          
        </div>
        <div class="col-4">
            <h2 class="all-community-title mt-5 mb-3">All Community</h2>
        </div>
        <div class="col-4 mt-5">
            <form action="#" method="get" class="py-3 ms-10">
                <div class="row community-search-form">
                    <div class="col-11 community-search-bar">
                        <input type="text" name="search" value="{{ old('name')}}" placeholder="search....." class="form-control">
                    </div>
                    <div class="col-1 border-0 magnifying-glass">
                        <i class="fa-solid fa-magnifying-glass py-3"></i>
                    </div>
                </div>               
            </form> 
        </div>

    </div>
    <div class="all-community">
        <div class="row">
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4 py-2">Healthy Food</h3> 
                <img src="{{ asset('images/community-healthyfood.png') }}" class="categories-images">
                </a> 
            </div>
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4  py-2">Excercise</h3>
                <img src="{{ asset('images/community-excercise.png') }}" class="categories-images">
                </a> 
            </div>
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4  py-2">Yoga</h3>
                <img src="{{ asset('images/community-yoga.png') }}" class="categories-images">
                </a> 
            </div>
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4  py-2">Build Muscle</h3> 
                <img src="{{ asset('images/community-muscle.png') }}" class="categories-images">
                </a> 
            </div>
        </div>
        <div class="row">
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4  py-2">Sleep</h3>
                <img src="{{ asset('images/community-sleep.png') }}" class="categories-images">
                </a> 
            </div>
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4  py-2">Hobby</h3>
                <img src="{{ asset('images/community-hobby.png') }}" class="categories-images">
                </a> 
            </div>
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4  py-2">Pets</h3>
                <img src="{{ asset('images/community-pets.png') }}" class="categories-images">
                </a> 
            </div>
            <div class="col each-community">
                <a href="#">
                <h3 class="community-categories mt-4  py-2">Stress management</h3>
                <img src="{{ asset('images/community-stressmanagement.png') }}" class="categories-images">
                </a> 
            </div>
        </div>
    </div>
</div>
@endsection