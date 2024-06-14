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
        @if ($user->avatar)
           <img src="{{ asset('images/Profile/' . $user->avatar) }}" alt="{{ $user->username }}" class="img-thumbnail rounded-circle profile-picture">
       @else
           <div class="default-profile-picture fa-solid text-secondary icon-lg">
             <i class="fas fa-user-circle"></i>
           </div>
       @endif
        <h4 class="user-name">{{ $user->username }}</h4>

        <div class="action-buttons">
          <button class="edit-button" onclick="window.location.href = '{{ route('profile-edit') }}'">Edit</button>
          <button type="button" class="btn delete-button" data-bs-toggle="modal" data-bs-target="#deleteAccountModal-{{ $user->id }}">Delete</button>
       </div>
    </div>

  <div class="user-display-container col-12">
    {{-- Profile Left --}}
    <div class="user-basic-info col-6">
      <div class="row">
          <div class="user-first col-5">
              <label for="first_name">First Name</label>
              <input type="text" id="first_name" name="first_name" value="{{ $user->firstname }}" disabled>
          </div>
          <div class="user-last col-5">
              <label for="last_name">Last Name</label>
              <input type="text" id="last_name" name="last_name" value="{{ $user->lastname }}" disabled>
          </div>
          <div class="goal_date_icon col-2" id="goal_date_icon"></div>
      </div>

      <div class="row">
          <div class="user-username col-5">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" value="{{ $user->username }}" disabled>
          </div>
          <div class="user-email col-5">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
          </div>
      </div>

      <div class="row">
        <div class="user-height col-3">
            <label for="height">Height</label>
            <div class="input-with-unit">
                <input type="number" id="height" name="height" value="{{ $user->height }}" disabled>
                <span class="user-unit">cm</span>
            </div>
        </div>
        <div class="user-goalweight col-3">
            <label for="goal_weight">Goal Weight</label>
            <div class="input-with-unit">
                <input type="number" id="goal_weight" name="goal_weight" value="{{ $user->goal_weight }}" disabled>
                <span class="user-unit">Kg</span>
            </div>
        </div>
        <div class="user-goaldate col-3">
            <label for="goal_date">Goal Date</label>
            <input type="date" id="goal_date" name="goal_date" value="{{ $user->goal_date }}" disabled>
        </div>
        <div class="user-purpose col-3">
            <label for="purpose">Purpose</label>
            <input type="text" id="purpose" name="purpose" value="{{ $user->purpose }}" disabled>
        </div>
      </div>

      <div class="row">
        <div class="user-posts-count">
              <label for="posts_count" class="col-10">The number of your posts in Communities</label>
              <input class="text-center" type="number" id="posts_count" name="posts_count" disabled value="{{ $user->posts->count() }}">
        </div>
      </div>
        <button class="check-posts-button" onclick="window.location='{{ route('profile-post', ['id' => $user->id]) }}'"> 
            <i class="fas fa-check-circle"></i> Check all your posts 
        </button>
    </div>

    {{-- Profile Right --}}
    <div class="user-measurements col-6">
        <div class="row">
                <div class="input-with-unit">
                    <label class="col-6" for="current_weight">Current Weight</label>
                    <input type="number" id="current_weight" name="current_weight" value="{{ $current_weight != 0 ? $current_weight : $user->prime_weight }}" disabled> 
                    {{-- <input type="number" id="current_weight" name="current_weight" value="{{ $user->weight->current_weight }}" disabled>  --}}
                    <span>Kg</span>
                </div>
        </div>
        <div class="row">
                <div class="input-with-unit">
                    <label class="col-6" for="achievement">Achievement</label>
                    <input type="number" id="achievement" name="achievement" disabled>
                    <span>%</span>
                </div>
        </div>
        <div class="row">
            <div class="tracking-goal weight-kg col-3">
                <span>Start</span>
                <input type="number" id="start_weight" value="{{ $user->prime_weight }}" disabled>
                <span class="unit-label">Kg</span>
            </div>
            <div class="tracking-goal goalbar col-6">
                <span class="bar">
                    <span id="tracking-goal-bar" class="tracking-goal-bar"></span>
                </span>
            </div>
            <div class="tracking-goal weight-kg col-3">
                <span>Goal</span>
                <input type="number" id="goal_weight" value="{{ $user->goal_weight }}" disabled>
                <span class="unit-label">Kg</span>
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
                    <input type="number" id="currentbmi" name="currentbmi" disabled>
                </div>
                    <a href="{{ route('log-weight-history', ['id' => $user->id]) }}" class="log-weight-history-button">
                        <i class="fas fa-check-circle"></i> Log Weight History
                    </a>
            </div>

        </div>
    </div>
 </div>

<div class="latest-meal-container">
    <p>Top 3 latest Meals</p>
    <div class="latest-meal-list">
        @foreach($user->meals->reverse()->take(3) as $meal)
            <div class="meal-item">
                <img src="{{ asset('images/meal/' . $meal->image) }}" alt="Meal photo">
            </div>
        @endforeach
    </div>
    <div class="view-meals-button">
        <a class="btn view-meals-button" href='{{ route('profile-meal-post', ['id' => $user->id]) }}'>
            <i class="fas fa-check-circle"></i> View all of your meals
        </a>
    </div> 
</div>
@include('profile/modals/delete-account')
</div>


{{-- Countdown --}}
<script>
    // ゴールの日付を設定
var goalDate = new Date("{{ $user->goal_date }}");
// ゴールの日付のミリ秒表現を取得
var goalTime = goalDate.getTime();

// 毎秒ごとにカウントを更新
var x = setInterval(function() {
  // 現在日時を取得
  var now = new Date().getTime();
    
  // 現在日時とゴールの日時との差を計算
  var distance = goalTime - now;
    
  // 日数、時間、分、秒の計算
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // HTML 要素の更新（残り日数を表示）
  var goalDateIcon = document.getElementById("goal_date_icon");
  if (goalDateIcon) {
    goalDateIcon.innerHTML = days + " Days Left ";
  }
    
  // カウントダウンが終了した場合は、テキストを変更
  if (distance <= 0) { // ゼロまたはマイナスの場合も考慮
    clearInterval(x);
    document.getElementById("goal_date_icon").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

{{--  for Chart --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- BMI Barometer --}}
<script src="{{ asset('js/BMI-barometer.js')}}"></script>
{{-- Achievement (%) & BMI --}}
<script src="{{ asset('js/achievement_and_BMI.js') }}"></script>
{{-- Goal Tracking Bar --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // スタートとゴールの重量を取得
        var startWeight = parseFloat(document.getElementById('start_weight').value);
        var goalWeight = parseFloat(document.getElementById('goal_weight').value);
        
        // 現在の重量
        var currentWeight = parseFloat("{{ $current_weight }}");

        // 進捗を計算
        var progress;
        if (startWeight > goalWeight) {
            // 減量の場合
            progress = (currentWeight - startWeight) / (goalWeight - startWeight) * 100;
        } else if (startWeight < goalWeight) {
            // 増量の場合
            progress = (currentWeight - startWeight) / (goalWeight - startWeight) * 100;
        } else {
            // スタートとゴールの重量が同じ場合は進捗を0に設定
            progress = 0;
        }
        
        // 進捗が0%未満や100%を超えないようにする
        progress = Math.max(0, Math.min(100, progress));

        // バロメーターの幅を更新
        document.getElementById('tracking-goal-bar').style.width = progress + '%';
    });
</script>

@endsection
