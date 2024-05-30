@extends('layouts.app')

@section('title', 'Register')

@push('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endpush

@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="register-text text-center h1 text-warning text-uppercase" style="">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        {{--register 1 --}}
                        <div class="row mb-3 register1">
                            <div class="col-6">
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="name">
                                            <label for="firstname" class="col-md-4 col-form-label text-md-first">{{ __('First name') }}</label>
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
            
                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="lastname">
                                            <label for="lastname" class="col-md-4 col-form-label text-md-first">{{ __('Last name') }}</label>
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                            @error('lastname')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="username">
                                            <label for="username" class="col-md-4 col-form-label text-md-first">{{ __('Username') }}</label>
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="email">
                                            <label for="email" class="col-md-4 col-form-label text-md-first">{{ __('Email Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
         
                                            @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="password">
                                            <label for="password" class="col-md-4 col-form-label text-md-first">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="confirmpass">
                                            <label for="password-confirm" class="col-mb-6 col-form-label text-md-first">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-6 mx-auto">
                                        <div class="row text-center">
                                            <div class="col-6">
                                                <div class="gender">
                                                    <label for="male"><span>Male</span></label>
                                                    <input type="radio" id="male" name="gender" value="male" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="gender">
                                                    <label for="female"><span>Female</span></label>
                                                   <input type="radio" id="female" name="gender" value="female">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-6">
                                <img src="{{ asset('images/register.png') }}" alt="register1" class="img_register">
                            </div>
                        </div>
                        <br>     
                        {{-- register 2 --}}
                        <div class="row mb-3 register2 border-radius2">
                            <div class="col-6 text-center">
                                <img src="{{ asset('images/register2.png') }}" alt="register2" class="img_reg">
                            </div>
                            <div class="col-6">
                                <br>
                                <div class="row">
                                   <div class="col-6">
                                        <div class="height">
                                            <label for="height" class="col-md-4 col-form-label text-md-first">{{ __('Height (cm)') }}</label>
                                            <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height" step="0.1">

                                            @error('height')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="prime_weight">
                                            <label for="prime_weight" class="col-md-4 col-form-label text-md-first">{{ __('Weight (kg)') }}</label>
                                            <input id="prime_weight" type="number" class="form-control @error('prime_weight') is-invalid @enderror" name="prime_weight" value="{{ old('prime_weight') }}" required autocomplete="prime_weight" step="0.1">

                                            @error('prime_weight')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="goal_weight">
                                            <label for="goal_weight" class="col-md-12 col-form-label text-start">{{ __('Goal Weight (kg)') }}</label>
                                            <input id="goal_weight" type="number" class="form-control @error('goal_weight') is-invalid @enderror" name="goal_weight" value="{{ old('goal_weight') }}" required autocomplete="goal_weight" step="0.1">

                                            @error('goal_weight')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="goal_date">
                                            <label for="goal_date" class="col-mb-12 col-form-label text-md-end">{{__('Date to achieve your goal weight')}}</label>
                                             <input id="goal_date" type="date" class="form-control @error('goal_date') is-invalid @enderror" name="goal_date" value="{{ old('goal_date') }}" required>

                                             @error('goal_date')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <p class="mb-0 mt-3">Porpose</p>
                                    <div class="col-4">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="purpose" value="Gain Weight"><span class="text-center">{{ __('Gain Weight') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="purpose" value="Lose Weight"><span class="text-center">{{ __('Lose Weight') }}</span></label>   
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="radio text-center">
                                            <label><input type="radio" name="purpose" value="Build Muscle"><span class="text-center">{{ __('Build Muscle') }}</span></label>
                                        </div>
                                    </div>
                                </div>
                                {{-- Register Button --}}
                                <div class="row mt-4">
                                    <div class="col text-center btn_reg ">
                                        <button type="submit" class="btn btn-warning btn_register">
                                                {{ __('Register') }}
                                        </button>
                                    </div>    
                                </div>  
                            </div> 
                        </div>    
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection
