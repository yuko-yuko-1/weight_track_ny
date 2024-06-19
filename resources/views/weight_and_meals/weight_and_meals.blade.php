@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('css/weight-and-meals.css')}}">
<link rel="stylesheet" href="{{ asset('css/calendar.css')}}">
<link rel="stylesheet" href="{{ asset('css/chart.css')}}">
<link rel="stylesheet" href="{{ asset('css/Profile/profile.css')}}">
<link rel="stylesheet" href="{{ asset('css/goalbar.css')}}">


<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@endpush

@section('title', 'Weight & Meals')

@section('content')

<script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/selected_date.js') }}" defer></script>
<script>
    const baseImageUrl = "{{ asset('images/meal/') }}";
</script>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
                
function drawChart() {
  var data = google.visualization.arrayToDataTable({!! json_encode($weightChartData) !!});
  var options = {
      title: 'Weight Chart',
      curveType: 'function',
      legend: { position: 'bottom' },
      chartArea: { width: 250, height: 150 },
      pointShape: 'circle',
      pointSize: 7,
      lineWidth: 2,
      series: {
          1: { lineDashStyle: [10, 2] },
      },
      colors: ['#FF2650', '#F67F96'],
      hAxis: {
          baselineColor: 'none',
          gridlines: { color: 'transparent' },
          textPosition: 'none'
      }
  };
  var chart = new google.visualization.LineChart(document.getElementById('myFirstchart'));
  chart.draw(data, options);
}

</script>
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

<div class="container-fluid hashboard_image">
    <br>
    <div class="my-auto">
        <div class="row justify-content-center position-relative main_top">
            <div class="col-5 text-center record_btn">
                <button type="button" data-bs-toggle="modal" data-bs-target="#record_weight" class="btn btn_record w-75"><h6><i class="icon1 fa-solid fa-pencil"></i> Record your weight everyday!</h6></button>
            </div>
            <div class="col-5 text-center post_btn">
                <button type="button" data-bs-toggle="modal" data-bs-target="#post_meal" class="btn btn_post w-75"><h6><i class="icon2 fa-solid fa-camera"></i> Post the photo of your meal!</h6></button>
            </div>
            {{-- <div class="col-2 text-center count_btn position-absolute" style="right: 20px">
                <a href="#" class="btn btn_post w-75 pull-right"><h6>#days left!</h6></a>
               </div> --}}
               <div class="goal_date_icon col-2 " id="goal_date_icon" style="width:100px;"></div>
        </div> 
        
        @include('weight_and_meals.modals.record')
        @include('weight_and_meals.modals.post_meals')

    </div>
    
    <br>
    <div class="row weightandmeals justify-content-center position-relative ">
        <div class="col-4 dashboard_main">
            {{-- Calender --}}
            <div class="dashboard_cal">
           <div class="wrapper">
            <header>
                <div class="icons">
                        <span class="material-symbols-outlined">
                            chevron_left
                            </span>
                    <p class="current-date">{{ $month }} {{ $year }}</p>
                 <span class="material-symbols-outlined" style="justify-content: end">
                        chevron_right
                        </span>
                </div>
            </header>
            <div class="calendar">
                <ul class="days">
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                </ul>
                <ul class="days">
                    @php
                                $monthNumber = \Carbon\Carbon::parse("$year-$month-01")->format('m');
                                $firstDayOfMonth = \Carbon\Carbon::parse("$year-$month-01")->dayOfWeek;
                                $daysInMonth = \Carbon\Carbon::parse("$year-$month-01")->daysInMonth;
                            @endphp
                            @for ($i = 0; $i < $firstDayOfMonth; $i++)
                                <li class="empty"></li>
                            @endfor
                            @for ($i = 1; $i <= $daysInMonth; $i++)
                                @php
                                    // Check if meals are available for this day
                                    $dayMeals = $latestMealsByDay->get(str_pad($i, 2, '0', STR_PAD_LEFT));
                                    $latestMeal = ($dayMeals && !$dayMeals->isEmpty()) ? $dayMeals->first() : null;
                                @endphp
                                <li class="{{ $i == $day ? 'active' : '' }}" data-day="{{ $i }}" data-year="{{ $year }}" data-month="{{ $month }}">
                                    {{ $i }}
                                    {{-- Debug output --}}
                                    @if ($latestMeal)
                                        <div class="meal-image" style="background-image: url('{{ asset('images/meal/' . $latestMeal->image) }}');"></div>
                                    @else
                                    @endif
                                </li>
                            @endfor
                </ul>
            </div>
           </div>
        
        </div>

        </div>
        <div class="col-6 main">
            <div class="row">
                <div class="col-6 dashboard_main">
                    {{-- Post --}}
                    <div class="dashboard_post">
                        <div class="wrapper2">
                            <header>
                                <div class="post_date1">
                                    <h5 id="date_record" class="current-date2">{{ $meal ? $meal->record_date : 'No meal data available' }}</h5>
                                </div>
                            </header>
                            <div class="col">
                                <div class="row post_time">
                                    <div class="col-6">
                                        <h6><i id="time_created" class="fa-regular fa-clock"></i> {{ $meal && $meal->created_at ? $meal->created_at->format('H:i') : '' }}</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                        @if($meal)
                                            <button type="button" class="btn text-end" data-bs-toggle="modal" data-bs-target="#meals_delete_{{ $meal->id }}">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        @elseif(isset($meal_from_calendar) && $meal_from_calendar->id)
                                            <button type="button" class="btn text-end" data-bs-toggle="modal" data-bs-target="#meals_delete_{{ $meal_from_calendar->id }}">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="row-7">
                                    <div class="post_meal">
                                        <div class="my-4">
                                            @if($meal && $meal->image)
                                                <img id="post_meal_img" src="{{ asset('images/meal/' . $meal->image) }}" alt="Latest Meal" class="grid-img">
                                            @elseif(isset($meal_from_calendar) && $meal_from_calendar->image)
                                                <img id="post_meal_img" src="{{ asset('images/meal/' . $meal_from_calendar->image) }}" alt="Latest Meal" class="grid-img">
                                            @else
                                                <img id="post_meal_img" src="" alt="Latest Meal" class="grid-img" style="display: none;">
                                                <h4 id="no_post_text" class="no_pic text-center text-muted">No posts yet.</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row-2 post_memo my-2">
                                    <h6>Memo</h6>
                                    <span id="memo_desc" class="fw-light">
                                        @if($meal)
                                            {{ $meal->description ?: 'No description available' }}
                                        @elseif(isset($meal_from_calendar) && $meal_from_calendar->description)
                                            {{ $meal_from_calendar->description }}
                                        @else
                                            No meal available.
                                        @endif
                                    </span>
                                    @if(!$meal && (!isset($meal_from_calendar) || !$meal_from_calendar->description))
                                        <!-- <p id="no_description">No meal available.</p> -->
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('weight_and_meals.modals.meals_delete')
                </div>



                <div class="col-6 dashboard_main mychart">
                   {{-- Graph --}}
                        <div class="wrapper3">
                            <header>
                                <div class="graph_weight">
                                    <h6 class="current-date2" style=""><span class="circle">⚫︎</span>Selected <Span class="goalline">----</Span>Weight Goal</h6>
                                </div>
                            </header>
                            <div class="myfirstchart flex-grow-1">  
                                <div id="myFirstchart" class="myFirstchart flex-grow-1"></div>
                            </div>
                        </div>
                </div>
                </div>

            <div class="row">
                <div class="col-1 my-auto">
                    <span class="start-goal">Start </span>
                </div>
                <div class="col-10">
                    <div class="goalbar"> 
                        <span class="bar">
                            <span class="achievement"></span>
                        </span>
                    </div>
                </div>
                <div class="col-1  my-auto">
                    <span class=""> Goal</span>
                </div>
            </div>
        </div>
        
        </div> 
    </div>

@endsection