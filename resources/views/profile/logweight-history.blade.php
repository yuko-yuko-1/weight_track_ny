@extends('layouts.app')

@section('title', 'Log-Weight-History')

@push('css')
<link rel="stylesheet" href="{{ asset('css/Profile/profile-logweight-history.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="profile-wrapper">
   <div class="background-photo"></div>
    <div class="profile-container">
          <a href="{{ route('profile-main', ['id' => Auth::id()]) }}">
           @if ($user->avatar)
           <img src="{{ asset('images/Profile/' . $user->avatar) }}" alt="{{ $user->username }}" class="img-thumbnail rounded-circle profile-picture">
            @else
           <div class="default-profile-picture fa-solid text-secondary icon-lg">
             <i class="fas fa-user-circle"></i>
           </div>
            @endif
          </a>
          
          <div class="log-weight-container">
              <span class="log-weight-text">Log Weight History</span>
              <button class="add-button btn_record" data-bs-toggle="modal" data-bs-target="#record_weight">
                  <i class="fas fa-pencil-alt"></i> Add
              </button>
          </div>
          @include('weight_and_meals.modals.record')
    </div>

      <div class="table-wrapper">
        <table class="log-weight-table">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>WEIGHT</th>
                    <th>LOSE/GAIN</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($weights as $weight)
                <tr>
                    <td class="col-3">{{ $weight->record_date->format('Y/m/d') }}</td>
                    <td class="col-3">{{ $weight->current_weight }} Kg</td>
                    <td class="weight-change col-3">
                        <!-- Calculate and display weight change if previous weight exists -->
                        @if($loop->index > 0)
                            @php
                                $previousWeight = $weights[$loop->index - 1]->current_weight;
                                $weightChange = $weight->current_weight - $previousWeight;
                            @endphp
                            {{ $weightChange }} Kg
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="col-3">
                        <button type="button" class="edit-button" data-date="{{ $weight->record_date->format('Y/m/d') }}" data-weight="{{ $weight->current_weight }}" data-weight-id="{{ $weight->id }}" onclick="openEditModal(this)"><i class="fas fa-pencil-alt"></i></button>
                        <button type="button" class="delete-button" data-date="{{ $weight->record_date->format('Y/m/d') }}" data-weight="{{ $weight->current_weight }}" data-weight-id="{{ $weight->id }}" onclick="openDeleteModal(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      </div>

  </div>
@include('profile/modals/edit-weight-log')
@include('profile/modals/delete-weight-log')

<script src="{{ asset('js/weight-history_modal.js') }}"></script>
<script src="{{ asset('js/weight-history_arrow.js') }}"></script>
@endsection