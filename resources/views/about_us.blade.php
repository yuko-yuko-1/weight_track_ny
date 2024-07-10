@extends('layouts.app')

@section('title', 'About Us')

@push('css')
<link rel="stylesheet" href="{{ asset('css/about_us.css')}}">
@endpush

@section('content')

<div class="container-fluid about_us_main">
    <div class="row">
        <div class="col-8">
                <h1 class="text-center mt-4 mb-5">About Us</h1>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('meal.today')}}">
                                <img class="about_images rounded" alt="meal_calendar" src="{{ asset('images/meal_calendar.png') }}"/> 
                            </a>                       
                        </div>
                        <div class="col-6">
                            <a href="{{ route('community')}}">
                                <img class="about_images rounded" alt="community" src="{{ asset('images/community.png') }}"/> 
                            </a> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-3 py-5">
                            <a href="{{ route('meal.today')}}">
                                <img class="about_images rounded" alt="daily_tracking" src="{{ asset('images/daily_tracking.png') }}"/> 
                            </a> 
                        </div>
                        <div class="col-6 mt-3 py-5">
                            <a href="{{ route('profile-main', Auth::user()->id) }}">
                                <img class="about_images rounded" alt="daily_tracking" src="{{ asset('images/profile.png') }}"/> 
                            </a> 
                        </div>
                    </div>
        </div>
        <div class="col-4 about_us">
            <img class="about_us_image" alt="about_us_image" src="{{ asset('images/about_us_image.png') }}"/> 
        </div>
    </div>
</div>

@endsection