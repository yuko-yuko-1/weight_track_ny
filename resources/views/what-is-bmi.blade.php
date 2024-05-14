@extends('layouts.app')

@section('title', 'What is BMI?')

@push('css')
<link rel="stylesheet" href="{{ asset('css/what-is-bmi.css')}}">
@endpush

@section('content')

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
              <h5><p>The following categories are typically used to interpret BMI values:</p></h5>  
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

@endsection