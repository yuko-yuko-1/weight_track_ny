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
                <tr>
                    <td class="col-3">2024/04/06</td>
                    <td class="col-3">45.7 Kg</td>
                    <td class="weight-change col-3"></td>
                    <td class="col-3">
                        <button class="edit-button" data-date="2024/04/06" data-weight="45.7"><i class="fas fa-pencil-alt"></i></button>
                        <button class="delete-button" onclick="openDeleteModal('2024/04/06', '45.7', this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="col-3">2024/04/05</td>
                    <td class="col-3">46.5 Kg</td>
                    <td class="weight-change col-3"></td>
                    <td class="col-3">
                        <button class="edit-button" data-date="2024/04/05" data-weight="46.5"><i class="fas fa-pencil-alt"></i></button>
                        <button class="delete-button" onclick="openDeleteModal('2024/04/05', '46.5', this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td class="col-3">{{ date('Y/m/d') }}</td>
                    <td class="col-3">{{ $primeWeight }} Kg</td>
                    <td class="weight-change col-3"></td>
                    <td class="col-3">
                        <button class="edit-button" data-date="{{ date('Y/m/d') }}" data-weight="{{ $primeWeight }}"><i class="fas fa-pencil-alt"></i></button>
                        <button class="delete-button" onclick="openDeleteModal('{{ date('Y/m/d') }}', '{{ $primeWeight }}', this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>

            </tbody>
        </table>
      </div>

  </div>
@include('profile/modals/edit-weight-log')
@include('profile/modals/delete-weight-log')

<script>
// Edit modal button
let rowToEdit;

    function openModal(date, weight, element) {
        document.getElementById('editDate').textContent = date;
        document.getElementById('editWeight').value = weight;
        rowToEdit = element.closest('tr');
        document.getElementById('editWeightModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('editWeightModal').style.display = "none";
    }

    function updateWeight() {
        const date = document.getElementById('editDate').textContent;
        const newWeight = document.getElementById('editWeight').value;

        // 行を更新
        rowToEdit.cells[1].textContent = newWeight;
        rowToEdit.querySelector('.edit-button').setAttribute('data-weight', newWeight);
        rowToEdit.querySelector('.delete-button').setAttribute('onclick', `openDeleteModal('${date}', '${newWeight}', this)`);

        closeModal();
    }

    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            const date = this.getAttribute('data-date');
            const weight = this.getAttribute('data-weight');
            openModal(date, weight, this);
        });
    });
    
// Delete modal button
// グローバル変数として削除対象の行を保持する変数
    let rowToDelete;

    // モーダルを開く関数
    function openDeleteModal(date, weight, element) {
        // モーダル内のデータを設定
        document.getElementById('deleteDate').innerText = date;
        document.getElementById('deleteWeight').innerText = weight;
        // 削除対象の行をグローバル変数に保存
        rowToDelete = element.closest('tr');
        // モーダルを表示
        document.getElementById('deleteWeightModal').style.display = 'block';
    }

    // モーダルを閉じる関数
    function closeDeleteModal() {
        // モーダルを非表示にする
        document.getElementById('deleteWeightModal').style.display = 'none';
    }

    // データを削除する関数
    function deleteWeight() {
        // 行を削除
        rowToDelete.remove();
        // モーダルを閉じる
        closeDeleteModal();
    }

document.addEventListener("DOMContentLoaded", function() {
    // テーブル内の各行を取得
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
