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