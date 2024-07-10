@extends('layouts.app')

@section('title', 'FAQ')

@push('css')
<link rel="stylesheet" href="{{ asset('css/faq.css')}}">
@endpush

@section('content')

<div class="container-fulid faq_main">
    <div class="row">
        <div class="col-5">
            <img class="faq_image" alt="faq_image" src="{{ asset('images/faq.png') }}"/> 
        </div>

        <div class="col-7 mt-4">
            <h1 class="mt-5 my-5">FAQ</h1>
            <div>
            <h3>What is the purpose of this weight tracking app?</h3> 
            <p>
                The purpose of our weight tracking app is to help you monitor and manage your weight effectively. <br>
                It allows you to track your weight over time, set goals, and receive insights into your progress.
            </p>
            </div>
            <div>
                <h3>How do I use the app to track my weight?</h3> 
                <p>
                    Manage weight changes by recording your daily weight. <br>
                    You can check your weight trends on the graph that records your weight.
                </p>
            </div>
            <div>
                <h3>Is my weight data secure and private?</h3> 
                <p>
                    Yes. Only you can see your weight record.
                </p>
            </div>
            <div>
                <h3>Can I set weight  goals in the app?</h3> 
                <p>
                    Yes,you can. During registration in this app, you can set 
                    weight and deadline goals.
                </p>
            </div>
            <div>
                <h3>Is there a cost associated with using the app?</h3> 
                <p>
                    It is possible to use that app for free
                </p>
            </div>
            
        </div>
    </div>
</div>

@endsection