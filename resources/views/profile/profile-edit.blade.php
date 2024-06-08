@extends('layouts.app')

@section('title', 'Profile Edit')

@push('css')
<link rel="stylesheet" href="{{ asset('css/Profile/profile-edit.css') }}">
@endpush

@section('content')
<div class="profile-wrapper">
    <div class="background-photo"></div>
    <form action="{{ route('profile-update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        {{-- Profile photo --}}
        <div class="profile-container">
            @if(isset($user->avatar))
                <div class="profile-picture-container">
                    <img src="{{ asset('images/Profile/' . $user->avatar) }}" alt="{{ $user->username }}" class="img-thumbnail rounded-circle profile-picture">
                    <i class="fa-solid fa-camera camera-icon" onclick="document.getElementById('file-input').click()"></i>
                    <input type="file" id="file-input" style="display: none;" name="avatar">
                </div>
            @else
                <div class="profile-picture-container">
                    <div class="default-profile-picture text-secondary icon-lg">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <i class="fa-solid fa-camera camera-icon" onclick="document.getElementById('file-input').click()"></i>
                    <input type="file" id="file-input" style="display: none;" name="avatar">
                </div>
            @endif
        </div>

        {{-- Profile Edit container --}}
        <div class="container">
            {{-- 1 --}}
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="firstname" value="{{ old('firstname', $user->firstname) }}">
                </div>
                <div class="col-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                </div>
            </div>

            {{-- 2 --}}
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">
                </div>
                <div class="col-4">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                </div>
            </div>

            {{-- 3 --}}
            <div class="row">
                <div class="col-4">
                    <label for="password">Old Password</label>
                    <input type="password" id="password" name="password" autocomplete="current-password">
                    @if ($errors->has('password')) 
                    <span class="password-error">{{ $errors->first('password') }}</span> 
                    @endif
                </div>

                <div class="col-4">
                    <label for="new-pw">New Password</label>
                    <input type="password" id="new-pw" name="new_password" autocomplete="new-password">
                    @error('new_password')
                        <span class="password-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="con-pw">Confirm New Password</label>
                    <input type="password" id="con-pw" name="confirm_password" autocomplete="new-password">
                    @error('confirm_password')
                        <div class="password-error">{{ $message }}</div>
                    @enderror
                    @if ($errors->has('new_password') && $errors->has('confirm_password'))
                        <div class="text-danger">New password and confirm password must match.</div>
                    @endif
                </div>
            </div>


            {{-- 4 --}}
            <div class="row">
                <div class="col-4">
                    <label for="height">Height (cm)</label>
                    <input type="number" id="height" name="height" value="{{ old('height', $user->height) }}">
                </div>
                <div class="col-4">
                    <label for="goal-weight">Goal Weight (kg)</label>
                    <input type="number" id="goal-weight" name="goal_weight" value="{{ old('goal_weight', $user->goal_weight) }}">
                </div>
                <div class="col-4">
                    <label for="goal-date">Goal Date</label>
                    <input type="date" id="goal-date" name="goal_date" value="{{ old('goal_date', $user->goal_date) }}">
                </div>
            </div>

            {{-- Purpose button --}}
            <div class="row">
                <label for="ed-purpose">Purpose:</label>
                <div class="select-options">
                    <div class="col-4 custom-radio">
                        <input type="radio" id="lose-weight" name="purpose" value="Lose Weight" {{ old('purpose', $user->purpose) === 'Lose Weight' ? 'checked' : '' }}>
                        <label for="lose-weight" class="radio-button">Lose Weight</label>
                    </div>
                    <div class="col-4 custom-radio">
                        <input type="radio" id="gain-weight" name="purpose" value="Gain Weight" {{ old('purpose', $user->purpose) === 'Gain Weight' ? 'checked' : '' }}>
                        <label for="gain-weight" class="radio-button">Gain Weight</label>
                    </div>
                    <div class="col-4 custom-radio">
                        <input type="radio" id="build-muscle" name="purpose" value="Build Muscle" {{ old('purpose', $user->purpose) === 'Build Muscle' ? 'checked' : '' }}>
                        <label for="build-muscle" class="radio-button">Build Muscle</label>
                    </div>
                </div>
            </div>

            <div class="row profile-edit-button">
                <button type="button" id="cancel-button" class="btn edit-cancel-button" onclick="window.location.href = '{{ route('profile-main', Auth::user()->id) }}'">Cancel</button>
                <button type="submit" id="save-button" class="btn edit-save-button">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
