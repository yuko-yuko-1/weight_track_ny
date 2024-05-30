// 進捗率と目標を仮定
let progressRate = 50; // 進捗率（0から100の間の値）
let goal = 100; // 目標

// 進捗バー要素を取得
let progressBar = document.querySelector('.progress');

// 進捗率に基づいて進捗バーの幅を更新
let width = (progressRate / goal) * 100;
progressBar.style.width = width + '%';
