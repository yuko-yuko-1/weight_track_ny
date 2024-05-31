@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('css/weight-and-meals.css')}}">
<link rel="stylesheet" href="{{ asset('css/calendar.css')}}">
<link rel="stylesheet" href="{{ asset('css/chart.css')}}">
<link rel="stylesheet" href="{{ asset('css/goalbar.css')}}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@endpush

@section('title', 'Weight & Meals')

@section('content')

<script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chart.js') }}"></script>

{{-- @php
$achievementPercentage = $user->achievement_percentage;
@endphp

<style>
    .achievement-dynamic {
        width: {{ $achievementPercentage }}%;
    }
</style> --}}


<div class="container hashboard_image">
    <br>
    <div class="my-auto">
        <div class="row justify-content-center position-relative">
            <div class="col-5 text-center record_btn">
                <button type="button" data-bs-toggle="modal" data-bs-target="#record_weight" class="btn btn_record w-75"><h6><i class="icon1 fa-solid fa-pencil"></i> Record your weight everyday!</h6></button>
            </div>
            <div class="col-5 text-center post_btn">
                <button type="button" data-bs-toggle="modal" data-bs-target="#post_meal" class="btn btn_post w-75"><h6><i class="icon2 fa-solid fa-camera"></i> Post the photo of your meal!</h6></button>
            </div>
            <div class="col-2 text-center count_btn position-absolute" style="right: 20px">
                <a href="#" class="btn btn_post w-75 pull-right"><h6>#days left!</h6></a>
               </div>
        </div> 
        
        @include('weight_and_meals.modals.record')
        @include('weight_and_meals.modals.post_meals')

    </div>
    
    <br>
    <div class="row weightandmeals">
        <div class="col-4 mb-3 dashboard_main">
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
                            $firstDayOfMonth = \Carbon\Carbon::parse("$year-$month-01")->dayOfWeek;
                            $daysInMonth = \Carbon\Carbon::parse("$year-$month-01")->daysInMonth;
                        @endphp
                        @for ($i = 0; $i < $firstDayOfMonth; $i++)
                            <li class="empty"></li>
                        @endfor
                        @for ($i = 1; $i <= $daysInMonth; $i++)
                            <li class="{{ $i == $day ? 'active' : '' }}">{{ $i }}</li>
                        @endfor
                </ul>

            </div>
           </div>
        
        </div>

        </div>
        <div class="col-8 mb-3 main">
            <div class="row">
                <div class="col-6 dashboard_main">
                    {{-- Post --}}
                    <div class="dashboard_post">
                        <div class="wrapper2">
                            <header>
                                <div class="post_date1">
                                    <h5 class="current-date2" style="">{{$day}} {{ $month }} {{ $year }}</h5>
                                </div>
                            </header>
                           
                            <div class="col">
                                <div class="row post_time">
                                    <div class="col-6">
                                        <h6 class="">Post Time</h6>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn dropdown-item text-end" data-bs-toggle="modal" data-bs-target="#meals_delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                    @include('weight_and_meals.modals.meals_delete')
                                </div>
                                <div class="row-7">
                                    <div class="post_meal">
                                        <p class="">No Post Yet</p>
                                        {{-- @forelse ($user->posts as $post)
                                        <div class="col-lg-4 col-md-6 mb-4">
                                           <a href="{{route('post.show',$post->id)}}">
                                              <img src="{{$post->image}}" alt="" class="grid-img">
                                          </a>
                                        </div>
                                    @empty
                                        <h4 class="text-center text-muted">No posts yet.</h4>
                                    @endforelse --}}
                                    </div>
                                </div>
                                <div class="row-2 post_memo">
                                    <h6>Memo</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 dashboard_main mychart">
                   {{-- Graph --}}
                        <div class="wrapper3">
                            <header>
                                <div class="graph_weight">
                                    <h6 class="current-date2" style=""><span class="circle">⚫︎</span>Selected <Span class="goalline">----</Span>Weight Goal</h6>
                                </div>
                            </header>
                            <div class="myfirstchart ">  
                                <div id="myFirstchart"></div>
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
</div>
@endsection