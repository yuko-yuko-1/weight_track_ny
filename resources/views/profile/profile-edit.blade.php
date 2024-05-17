@extends('layouts.app')

@section('title', 'Profile Edit')

@push('css')
<link rel="stylesheet" href="{{ asset('css/Profile/profile-edit.css')}}">
@endpush

@section('content')
<div class="profile-wrapper">
   <div class="background-photo"></div>
  {{-- Profile photo --}}
      <div class="profile-container">
          @if(isset($profile_picture))
              <div class="profile-picture-container">
                  <img src="{{ $profile_picture }}" alt="profile pic" class="profile-picture">
                  <i class="fa-solid fa-camera camera-icon"></i>
              </div>
          @else
              <div class="profile-picture-container">
                  <div class="default-profile-picture">
                      <i class="fas fa-user-circle"></i>
                  </div>
                  <i class="fa-solid fa-camera camera-icon"></i>
              </div>
          @endif
      </div>

  {{-- Profile Edit container --}}
   <div class="container">
      {{-- 1--}}
      <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
          <label for="ed-first-name">First Name</label>
          <input type="text" id="ed-first-name" name="ed-first-name">
        </div>
        <div class="col-4">
          <label for="ed-last-name">Last Name</label>
          <input type="text" id="ed-last-name" name="ed-last-name">
        </div>
      </div>

      {{-- 2 --}}
      <div class="row">
        <div class="col-2"></div>
        <div class="col-4">
          <label for="ed-user-name">User Name</label>
          <input type="text" id="ed-user-name" name="ed-user-name">
        </div>
        <div class="col-4">
          <label for="ed-email">Email Address</label>
          <input type="text" id="ed-email" name="ed-email">
        </div>
      </div>

      {{-- 3 --}}
      <div class="row">
        <div class="col-4">
          <label for="ed-old-pw">Old Password</label>
          <input type="text" id="ed-old-pw" name="ed-old-pw">
        </div>
        <div class="col-4">
          <label for="ed-new-pw">New Password</label>
          <input type="text" id="ed-new-pw" name="ed-new-pw">
        </div>
        <div class="col-4">
          <label for="ed-con-pw">Confirm Password</label>
          <input type="text" id="ed-con-pw" name="ed-con-pw">
        </div>
      </div>

      {{-- 4--}}
      <div class="row">
        <div class="col-4">
          <label for="ed-height">Height (cm)</label>
          <input type="number" id="ed-height" name="ed-height">
        </div>
        <div class="col-4">
          <label for="ed-goal-weight">Goal Weight (kg)</label>
          <input type="number" id="ed-goal-weight" name="ed-goal-weight">
        </div>
        <div class="col-4">
          <label for="ed-goal-date">Goal Date</label>
          <input type="date" id="ed-goal-date" name="ed-goal-date">
        </div>
      </div>

    {{-- Puropose button --}}
      <div class="row">
        <label for="ed-purpose">Purpose:</label>
        <div class="select-options">
            <div class="col-4 custom-radio">
                <input type="radio" id="lose-weight" name="ed-purpose" value="lose-weight">
                <label for="lose-weight" class="radio-button">Lose Weight</label>
            </div>
            <div class="col-4 custom-radio">
                <input type="radio" id="gain-weight" name="ed-purpose" value="gain-weight">
                <label for="gain-weight" class="radio-button">Gain Weight</label>
            </div>
            <div class="col-4 custom-radio">
                <input type="radio" id="build-muscle" name="ed-purpose" value="build-muscle">
                <label for="build-muscle" class="radio-button">Build Muscle</label>
            </div>
        </div>
      </div>

    <div class="row profile-edit-button">
            <button type="button" id="cancel-button" class="btn edit-cancel-button">Cancel</button>
            <button type="button" id="save-button" class="btn edit-save-button">Save</button>
    </div>

  </div>
</div>

@endsection