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
              <button class="add-button" onclick="window.location.href = '#'">
                  <i class="fas fa-pencil-alt"></i> Add
              </button>
          </div>
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

<script>
// Edit modal button
function openEditModal(element) {
    const date = element.getAttribute('data-date');
    const weight = element.getAttribute('data-weight');
    const weightId = element.getAttribute('data-weight-id');

    document.getElementById('editDate').textContent = date;
    document.getElementById('editWeight').value = weight;
    document.getElementById('editWeightId').value = weightId;

    const form = document.getElementById('editWeightForm');
    form.action = `/log-weight-history/${weightId}/update`;

    document.getElementById('editWeightModal').style.display = "block";
}

function closeModal() {
    document.getElementById('editWeightModal').style.display = "none";
}

// Delete modal button
function openDeleteModal(element) {
    const date = element.getAttribute('data-date');
    const weight = element.getAttribute('data-weight');
    const weightId = element.getAttribute('data-weight-id');

    document.getElementById('deleteDate').textContent = date;
    document.getElementById('deleteWeight').textContent = weight;

    const form = document.getElementById('deleteWeightForm');
    form.action = `/log-weight-history/${weightId}/delete`;

    document.getElementById('deleteWeightModal').style.display = "block";
}

function closeDeleteModal() {
    document.getElementById('deleteWeightModal').style.display = "none";
}

document.addEventListener("DOMContentLoaded", function() {
    // 各行に対して処理を実行
    var rows = document.querySelectorAll(".log-weight-table tbody tr");

    // 各行に対して処理を実行
    for (var i = 0; i < rows.length - 1; i++) { // 最後の行は比較対象がないため除外
        var currentWeightCell = rows[i].querySelector(":nth-child(2)"); // 現在の行のWEIGHTのセルを取得
        var nextWeightCell = rows[i + 1].querySelector(":nth-child(2)"); // 一つ下の行のWEIGHTのセルを取得
            
        var currentWeight = parseFloat(currentWeightCell.textContent); // 現在の行の体重を数値に変換
        var nextWeight = parseFloat(nextWeightCell.textContent); // 一つ下の行の体重を数値に変換

        // 増減量のアイコンと数値を設定
        var iconHTML = '';
        var changeValue = Math.abs(nextWeight - currentWeight); // 変化量を計算

        if (nextWeight > currentWeight) {
            iconHTML = '<i class="fas fa-arrow-down" style="color: green;"></i> ' + changeValue.toFixed(1) + " Kg";
        } else if (nextWeight < currentWeight) {
            iconHTML = '<i class="fas fa-arrow-up" style="color: red;"></i> ' + changeValue.toFixed(1) + " Kg";
        } else {
            iconHTML = '<span style="color: gray;">-</span>';
        }

        // アイコンと数値を表示
        rows[i].querySelector(".weight-change").innerHTML = iconHTML;
    }
});
</script>
@endsection