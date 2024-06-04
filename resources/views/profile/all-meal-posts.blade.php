@extends('layouts.app')

@section('title', 'All-Your-Meals-Posts')

@push('css')
<link rel="stylesheet" href="{{ asset('css/Profile/profile-allmeals-posts.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="profile-wrapper">
    <div class="background-photo"></div>
    <div class="profile-container">
        <a href="{{ route('profile-main') }}">
            @if($user->avatar)
            <div class="profile-picture">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}">
            </div>
            @else
            <div class="default-profile-picture">
                <i class="fas fa-user-circle"></i>
            </div>
            @endif
        </a>
        
        <div class="all-meals-title-container">
            <span class="all-meals-text">All Meals Posts</span>
            <button class="add-button" onclick="window.location.href ='#'">
                <i class="fas fa-pencil-alt"></i> Add
            </button>
        </div>
    </div>

    <div class="meals-grid">
        {{-- @foreach($mealPhotos as $photo) --}}
        <div class="meal-items">
            {{-- <img src="{{ asset('storage/' . $photo->path) }}" alt="meal photo"> --}}
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-08</div>
            </div>
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-07</div>
            </div>
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-06</div>
            </div>
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-05</div>
            </div>
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-04</div>
            </div>
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-03</div>
            </div>
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-02</div>
            </div>
            <div class="meal-item">
                <div class="meal-photo"></div>
                <div class="meal-date">2023-01-01</div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>
</div>
@endsection
