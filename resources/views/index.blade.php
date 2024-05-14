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

{{-- what is bmi --}}
<div class="container mt-5 mb-4">
    <div class="row">
        <div class="col what-is-bmi1"></div>
        <div class="col what-is-bmi2"><h1 class="what-is-bmi-title pt-2">What's BMI?</h1></div>
    </div>
          <h3 class="what-is-bmi-description pt-2 pb-4">
            BMI, or Body Mass Index, is a commonly used measurement to assess an
            individual's body composition and determine whether their weight falls
            within a healthy range relative to their height.
          </h3>
 
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-6">
                    <div class="row py-2">
                        <div class="col bmi-explanation1"></div>
                        <div class="col bmi-explanation2 ps-4"><h2 class="bmi-explanation3">Definition</h2></div>
                    </div>
                        <div class="bmi-explanation4">
                            <h5>BMI is a numerical value calculated by dividing a person's weight in
                          kilograms by the square of their height in meters<br> (BMI = weight /
                          height^2).</h5>
                        </div>            
                </div>
                <div class="col-6">
                    <div class="row py-2">  
                        <div class="col bmi-explanation1"></div>
                        <div class="col bmi-explanation2 ps-4"><h2 class="bmi-explanation3">Interpretation</h2></div>
                    </div>
                        <div class="bmi-explanation4">
                          <h5>BMI provides an indication of whether a person is underweight, normal
                          weight, overweight, or obese based on the calculated value.</h5>
                        </div>        
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row py-2">
                        <div class="col bmi-explanation1"></div>
                        <div class="col bmi-explanation2 ps-4"><h2 class="bmi-explanation3">Health Implications</h2></div>
                    </div>
                        <div class="bmi-explanation4">
                          <h5>BMI is often correlated with health risks. Individuals with a BMI
                          outside the normal range may be at increased risk for various health
                          conditions, such as cardiovascular diseases, diabetes, and certain
                          cancers.</h5>
                        </div>         
                </div>
                <div class="col-6">
                    <div class="row py-2">
                        <div class="col bmi-explanation1"></div>
                        <div class="col bmi-explanation2 ps-4"><h2 class="bmi-explanation3">Limitations</h2></div>
                    </div>
                        <div class="bmi-explanation4">
                            <h5>While BMI is a useful screening tool, it has limitations. It does not
                          directly measure body fat percentage or distribution, and it may not
                          accurately assess body composition in certain populations, such as
                          athletes or older adults.</h5>
                        </div>             
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row py-2">    
                        <div class="col bmi-explanation1"></div>
                        <div class="col bmi-explanation2 ps-4"><h2 class="bmi-explanation3">Recommendations</h2></div>
                    </div>
                        <div class="bmi-explanation4">
                          <h5>BMI should be used as part of a comprehensive health assessment, along
                          with other factors such as waist circumference, lifestyle habits, and
                          family history, to evaluate an individual's overall health status and
                          risk factors.</h5>
                        </div>              
                </div>
                <div class="col-6">
                    <div class="row py-2">
                        <div class="col bmi-explanation1"></div>
                        <div class="col bmi-explanation2 ps-4"><h2 class="bmi-explanation3">Consultation</h2></div>
                    </div>
                        <div class="bmi-explanation4">
                          <h5>It's advisable for individuals to consult with a healthcare professional
                          for personalized guidance and interpretation of BMI results, as well as
                          recommendations for healthy weight management strategies.</h5>
                        </div>                     
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row py-2">
                <div class="col bmi-explanation1"></div>
                <div class="col bmi-explanation2 ps-4"><h2 class="bmi-explanation3">Categories</h2></div> 
              </div>
              <div class="bmi-explanation4">
              <h5>The following categories are typically used to interpret BMI values:</h5>  
              </div>       
                <div class="explanation-of-bmi-numbers">
                  <ul>
                      <div>
                        <span> - </span>
                        <span>Underweight </span>
                        <span>: BMI less than 18.5</span>
                      </div>
                      <div>
                          <span> - </span>
                          <span>Normal weight </span>
                          <span>: BMI between 18.5 and 24.9</span>
                      </div>
                      <div>
                          <span> - </span>
                          <span>Overweight </span>
                          <span>: BMI between 25 and 29.9</span>
                      </div>
                      <div>
                          <span> - </span>
                          <span>Obesity </span>
                          <span>: BMI 30 or greater</span>
                      </div>
                  </ul>
                </div>
                <div class="col">
                    <img class="bmi_measure" alt="bmi_measure" src="{{ asset('images/bmi_measure.png') }}"/>
                </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/index-script.js')}}"></script>

@endsection