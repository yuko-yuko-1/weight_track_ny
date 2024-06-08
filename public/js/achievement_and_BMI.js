    // アチーブメントとBMIを計算する関数
    function calculateAchievementAndBMI() {
        var currentWeight = parseFloat(document.getElementById("current_weight").value);
        var startWeight = parseFloat(document.getElementById("start_weight").value);
        var goalWeight = parseFloat(document.getElementById("goal_weight").value);

        if (currentWeight !== 0 && startWeight !== 0 && goalWeight !== 0) {
            var achievement;
            if (startWeight > goalWeight) {
                // 減量の場合
                achievement = ((startWeight - currentWeight) / (startWeight - goalWeight)) * 100;
            } else if (startWeight < goalWeight) {
                // 増量の場合
                achievement = ((currentWeight - startWeight) / (goalWeight - startWeight)) * 100;
            }
            // アチーブメントを表示
            document.getElementById("achievement").value = achievement.toFixed(2);
        } else {
            // どちらかの体重が0の場合は、アチーブメントを0とする
            document.getElementById("achievement").value = 0;
        }

        // 現在の体重と身長を取得
        var currentWeightForBMI = parseFloat(document.getElementById("current_weight").value);
        var heightForBMI = parseFloat(document.getElementById("height").value);

        // 身長をメートルに変換
        var heightInMeter = heightForBMI / 100;

        // BMIを計算
        var bmi = currentWeightForBMI / (heightInMeter * heightInMeter);

        // 計算結果を表示
        document.getElementById("currentbmi").value = bmi.toFixed(2); // BMIを小数点以下2桁で表示
    }

    window.onload = function() {
        // 現在の体重を取得
        var currentWeight = parseFloat(document.getElementById("current_weight").value);
        // 0の場合は代わりにprime_weightを使用
        if (currentWeight === 0) {
            document.getElementById("current_weight").value = parseFloat("{{ $user->prime_weight }}");
        }
        calculateAchievementAndBMI();
    };

    // 身長や体重が変更されたときにBMIとアチーブメントを再計算
    document.getElementById("current_weight").addEventListener("input", calculateAchievementAndBMI);
    document.getElementById("height").addEventListener("input", calculateAchievementAndBMI);
    document.getElementById("goal_weight").addEventListener("input", calculateAchievementAndBMI);
