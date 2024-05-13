@extends('layouts.app')

@section('title', 'Home')

@push('css')
<link rel="stylesheet" href="{{ asset('css/index-page.css')}}">
@endpush

@section('content')

<div class="row mb-5 text-center landing_image_area">
    <div class="my-auto">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1 class="display-2 text-white landing_title">YOUR ALLY IN WEIGHT MANAGEMENT</h1>
                <p class="text-success h5">Learn more about us!</p>
                <div class="row mt-5">
                    <div class="col-6 text-end">
                        <a href="#bmi" class="btn btn_landing1 w-75 text-white">Let's calculate your BMI!</a>
                    </div>
                    <div class="col-6 text-start">
                        <a href="{{ route('register') }}" class="btn btn_landing2 w-75 text-white fw-bold">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="container-fluid bmi_calc_area mb-4">

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="text-center" id="bmi">BMI Calculator</h1>
                    <p class="text-center px-5">BMI is a measurement of a person's leanness or corpulence based on their height and weight, and is intended to quantify tissue mass.</p>
                </div>
            </div>
            <div class="bmi_calc_bg_color rounded px-4 py-2 mb-5">
                <div class="row my-5">
                    <div class="col-6 text-center">
                        <div>
                            <span class="me-1">Height</span>
                            <input type="number" class="py-3 text-center border-0 w-50" id="height" step="0.1" min="100" max="230">
                            <span class="ms-1">cm</span>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div>
                            <span class="me-1">Weight</span>
                            <input type="number" class="py-3 text-center border-0 w-50" id="weight" step="0.1" min="0" max="200">
                            <span class="ms-1">kg</span>
                        </div>
                    </div>
                </div>
                <div class="row text-center mb-4">
                    <div class="col">
                        <button onclick="calculateBMI(), calculateStandardWeight(), calculateWeightDiff()" class="btn btn_calc_bmi text-white w-50 py-2">Calculate</button>
                    </div>
                </div>
            </div>
        
            <div class="row text-center">
                <div class="col-4">
                    <div class="bmi_calc_bg_color rounded py-3 px-1">
                        <p>Your BMI</p>
                        <br>
                        <div class="bg-white w-75 mx-auto mb-3">
                            <h5 id="result1" class="py-4"></h5>
                        </div>
                        <p>You can determine the ratio of weight to height.</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bmi_calc_bg_color rounded py-3 px-1">
                        <p>Standard weight <br> according to BMI</p>
                        <div class="bg-white w-75 mx-auto mb-3">
                            <h5 id="result2" class="py-4"></h5>
                        </div>
                        <p>This is the weight when the BMI is the standard value of 22.</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bmi_calc_bg_color rounded py-3 px-1">
                        <p>current weight - standard weight</p>
                        <br>
                        <div class="bg-white w-75 mx-auto mb-3">
                            <h5 id="result3" class="py-4"></h5>
                        </div>
                        <p>If this number is positive, it indicates being slightly overweight.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/index-script.js')}}"></script>

@endsection