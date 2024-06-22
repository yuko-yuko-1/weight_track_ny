<!-- resources/views/meals.blade.php -->
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
        <a href="{{ route('profile-main',$user->id) }}">
            @if ($user->avatar)
                <img src="{{ asset('images/Profile/' . $user->avatar) }}" alt="{{ $user->username }}" class="img-thumbnail rounded-circle profile-picture">
            @else
                <div class="default-profile-picture fa-solid text-secondary icon-lg">
                    <i class="fas fa-user-circle"></i>
                </div>
            @endif
        </a>
        
        <div class="all-meals-title-container">
            <span class="all-meals-text">All Meals Posts</span>
            <button class="add-button" data-bs-toggle="modal" data-bs-target="#post_meal">
                <i class="fas fa-pencil-alt"></i> Add
            </button>
        </div>
    </div>

    <div class="meals-grid">
        <div class="meal-items">
            @foreach($user->meals->reverse() as $meal)
                <div class="meal-item" data-bs-toggle="modal" data-bs-target="#deleteMealModal" data-id="{{ $meal->id }}" data-image="{{ asset('images/meal/' . $meal->image) }}">
                    <img src="{{ asset('images/meal/' . $meal->image) }}" alt="Meal photo" class="btn rounded-5">
                    <span class="meal-date">{{ $meal->record_date }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('profile/modals/delete-meal-posts')
@include('weight_and_meals.modals.post_meals')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteMealModal = document.getElementById('deleteMealModal');
        deleteMealModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var mealId = button.getAttribute('data-id');
            var mealImage = button.getAttribute('data-image');

            var form = deleteMealModal.querySelector('form');
            var imageElement = deleteMealModal.querySelector('#mealToDeleteImage');

            form.action = `/weight_and_meals/today/meal_destroy/${mealId}`;
            imageElement.src = mealImage;
        });
    });
</script>
@endsection
