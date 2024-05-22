@extends('layouts.app')

@section('title', 'Profile')

@push('css')
<link rel="stylesheet" href="{{ asset('css/Profile/profile.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="profile-wrapper">
   <div class="background-photo"></div>

    <div class="profile-container">
        @if(isset($profile_picture))
        <img src="{{ $profile_picture }}" alt="profile pic" class="profile-picture">
        @else
            <div class="default-profile-picture">
                <i class="fas fa-user-circle"></i>
            </div>
        @endif
        <h4 class="user-name">User name</h4>

        <div class="action-buttons">
          <button class="edit-button" onclick="window.location.href = '{{ route('profile-edit') }}'">Edit</button>
          <button type="button" class="btn delete-button" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Delete</button>
       </div>
     </div>

  <div class="user-display-container col-12">
    {{-- Profile Left --}}
    <div class="user-basic-info col-6">
      <div class="row">
          <div class="user-first col-5">
              <label for="first_name">First Name</label>
              <input type="text" id="first_name" name="first_name">
          </div>
          <div class="user-last col-5">
              <label for="last_name">Last Name</label>
              <input type="text" id="last_name" name="last_name">
          </div>
          <div class="goal_date col-2" id="goal_date"></div>
      </div>

      <div class="row">
          <div class="user-username col-5">
              <label for="username">Username</label>
              <input type="text" id="username" name="username">
          </div>
          <div class="user-email col-5">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email">
          </div>
      </div>

      <div class="row">
        <div class="user-height col-3">
            <label for="height">Height</label>
            <input type="number" id="height" name="height">
        </div>
        <div class="user-goalweight col-3">
            <label for="goal_weight">Goal Weight</label>
            <input type="number" id="goal_weight" name="goal_weight">
        </div>
        <div class="user-goaldate col-3">
            <label for="goal_date">Goal Date</label>
            <input type="date" id="goal_date" name="goal_date">
        </div>
        <div class="user-purpose col-3">
            <label for="purpose">Purpose</label>
            <input type="text" id="purpose" name="purpose">
        </div>
      </div>

      <div class="row">
        <div class="user-posts-count">
              <label for="posts_count" class="col-10">The number of your posts in Communities</label>
              <input type="number" id="posts_count" name="posts_count">
        </div>
      </div>
        <button class="check-posts-button" onclick="checkPosts()">
         <i class="fas fa-check-circle"></i> Check all your posts
        </button>
    </div>

    {{-- Profile Right --}}
    <div class="user-measurements col-6">
        <div class="row">
                <div class="input-with-unit">
                    <label class="col-6" for="current_weight">Current Weight</label>
                    <input type="number" id="current_weight" name="current_weight"> 
                    <span>Kg</span>
                </div>
        </div>
        <div class="row">
                <div class="input-with-unit">
                    <label class="col-6" for="achievement">Achievement</label>
                    <input type="number" id="achievement" name="achievement">
                    <span>%</span>
                </div>
        </div>
        <div class="row">
            <div class="tarcking-goal col-3">
                <span>Start</span>
                <input type="number">
            </div>
            <div class="tracking-goal-meter col-6">
                 <div class="tracking-goal"></div>
            </div>
            <div class="tarcking-goal col-3">
                <span>Goal</span>
                <input type="number">
            </div>
        </div>
        <div class="row">
            <div class="tarcking-goal col-6">
              {{-- BMI barometer  --}}
                  <div class="chartBox">
                      <canvas id="myChart"></canvas>
                  </div>
            </div>

            <div class="tarcking-goal col-6">
                <div class="input-with-unit">
                    <label class="col-6" for="currentbmi">Current BMI</label>
                    <input type="number" id="currentbmi" name="currentbmi">
                </div>
                <button class="log-weight-history-button" onclick="window.location='{{ route('logweight-history') }}'">
                    <i class="fas fa-check-circle"></i> Log Weight History
                </button>
            </div>
        </div>
    </div>
 </div>

  <div class="latest-meal-container">
      <p>Top 3 latest Meals</p>
      <div class="latest-meal-list">
        <div class="meal-item"></div>
        <div class="meal-item"></div>
        <div class="meal-item"></div>
      </div>
      <div class="view-meals-button">
        <button onclick="window.location.href='{{ route('all-meal-posts') }}'">
            <i class="fas fa-check-circle"></i> View all of your meals
        </button>
      </div> 
  </div>
@include('profile/modals/delete-account')
</div>


{{-- Countdown --}}
<script src="{{ asset('js/countdown-day.js')}}"></script>
{{-- Tracking-meter --}}
<script src="{{ asset('js/tracking-goal.js')}}"></script>
{{-- BMI barometer --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script src="{{ asset('js/BMI-barometer.js')}}"></script>

@endsection

