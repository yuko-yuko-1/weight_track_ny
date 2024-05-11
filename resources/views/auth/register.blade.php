@extends('layouts.app')

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
                            <div class="col-3">
                                <br>
                                <div class="name">
                                    <label for="firstname" class="col-md-4 col-form-label text-md-first">{{ __('First name') }}</label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
    
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="username">
                                    <label for="username" class="col-md-4 col-form-label text-md-first">{{ __('Username') }}</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
      
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="password">
                                    <label for="password" class="col-md-4 col-form-label text-md-first">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="gender">
                                    <label for="male"><span>Male</span></label>
                                    <input type="radio" id="male" name="gender radio1" value="male" >
                                </div>
                                <br>
                                <br>
                            </div>
                            {{--  --}}
                            <div class="col-md-3 mr-auto">
                                <br>
                                <div class="lastname">
                                   <label for="lastname" class="col-md-4 col-form-label text-md-first">{{ __('Last name') }}</label>
                                   <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                   @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                               <br>
                               <div class="email">
                                   <label for="email" class="col-md-4 col-form-label text-md-first">{{ __('Email Address') }}</label>
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                               <br>
                                <div class="confornpass">
                                  <label for="password-confirm" class="col-mb-6 col-form-label text-md-first">{{ __('Confirm Password') }}</label>
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <br>
                                <div class="gender">
                                    <label for="female"><span>Female</span></label>
                                   <input type="radio" id="female" name="gender radio1" value="female">
                                </div>
                             </div>
                             <br>
                             <br>
                             <div class="col-6">
                                <img src="{{ asset('images/register.png') }}" alt="register" class="img_register">
                             </div>
                        </div>
                        <br>     
                        {{-- register 2 --}}
                        <div class="row mb-3 register2 border-radius2">
                            <div class="col-6 text-center">
                                <img src="{{ asset('images/register2.png') }}" alt="" class="img_reg">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                   <div class="col-6">
                                   <br>
                                   <div class="height">
                                      <label for="height" class="col-md-4 col-form-label text-md-first">{{ __('Height(cm)') }}</label>
                                      <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height" autofocus>
                                </div>
                                <br>
                                <div class="goalweight">
                                    <label for="goalweight" class="col-md-12 col-form-label text-start">{{ __('Goal Weight(kg)') }}</label>
                                    <input id="goalweight" type="number" class="form-control @error('goalweight') is-invalid @enderror" name="goalweight" value="{{ old('goalweight') }}" required autocomplete="goalweight" autofocus>
                                </div>
                                <br>
                            
                            </div>
                            <div class="col-6">
                                <br>
                                <div class="weight">
                                    <label for="weight" class="col-md-4 col-form-label text-md-first">{{ __('Weight(kg)') }}</label>
                                    <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight" autofocus>
                                </div>
                                <br>
                                <div class="goaldate">
                                    <label for="goaldate" class="col-mb-12 col-form-label text-md-end">{{__('Date to achieve your goal weight')}}</label>
                                     <input id="goaldate" type="date" class="form-control @error('goaldate') is-invalid @enderror" name="goaldate" autofocus>
                                </div>
                                <br>
                            </div>
                           {{-- </div> --}}
                          <div class="row">
                            <div class="col-4">
                               <div class="radio w-100">
                                 <label><input type="radio" name="purpose"><span class="text-center">{{ __('Gain Weight') }}</span></label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="radio">
                                 <label><input type="radio" name="purpose" ><span class="text-center">{{ __('Lose Weight') }}</span></label>   
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="radio">
                                 <label><input type="radio" name="purpose"><span class="text-center">{{ __('Build Muscle') }}</span></label>   
                               </div>
                            </div>
                          </div>
                          {{-- Register Button --}}
                          <div class="row">
                            <div class="col text-ceter btn_reg ">
                               <button type="submit" class="btn btn-warning btn_register">
                                        {{ __('Register') }}
                               </button>
                            </div>    
                          </div>  
                        </div> 
                    </form>
                </div>
        </div>
    </div>
</div>

@endsection
